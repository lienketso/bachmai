<?php


namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Comment\Models\Comment;
use Illuminate\Http\Request;
use Post\Repositories\PostRepository;
use Category\Repositories\CategoryRepository;

class BlogController extends BaseController
{
    protected $model;
    protected $postmodel;
    protected $lang;
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->lang = session('lang');
        $this->model = $categoryRepository;
        $this->postmodel = $postRepository;
    }

    public function index($slug){
        $data = $this->model->findWhere(['slug'=>$slug])->first();

        //cấu hình các thẻ meta
        $meta_title = $data->meta_title;
        $meta_desc = cut_string($data->meta_desc,190);
        $meta_url = route('frontend::blog.index.get',$data->slug);
        if($data->thumbnail!=''){
            $meta_thumbnail = upload_url($data->thumbnail);
        }else{
            $meta_thumbnail = public_url('admin/themes/images/no-image.png');
        }
        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

        $list = $this->postmodel->scopeQuery(function($e) use($data){
            return $e->orderBy('created_at','desc')
            ->where('category',$data->id)
            ->where('status','active');
        })->paginate(10);

        //danh mục con nếu có
        $categoryChild = $this->model->orderBy('sort_order','asc')
            ->findWhere(['parent'=>$data->id]);
        //Các bài viết mới nhất
        $popularPost = $this->postmodel->scopeQuery(function($e) {
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('post_type','blog');
        })->limit(6);

        return view('frontend::blog.index',[
            'data'=>$data,
            'list'=>$list,
            'categoryChild'=>$categoryChild,
            'popularPost'=>$popularPost
        ]);
    }

    function detail($slug){
        $data = $this->postmodel->findWhere(['slug'=>$slug])->first();

        //cấu hình các thẻ meta
        $meta_title = $data->meta_title;
        $meta_desc = cut_string($data->meta_desc,190);
        $meta_url = route('frontend::post.detail.get',$data->slug);
        if($data->thumbnail!=''){
            $meta_thumbnail = upload_url($data->thumbnail);
        }else{
            $meta_thumbnail = public_url('admin/themes/images/no-image.png');
        }
        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

        $input['count_view'] = $data->count_view+1;
        $this->postmodel->update($input,$data->id);
        //end update count view

        //tất cả chuyên mục
        $categoryChild = $this->model->orderBy('sort_order','asc')
            ->findWhere(['type'=>'post','parent'=>0,'lang_code'=>$this->lang]);
        //Các bài viết mới nhất
        $popularPost = $this->postmodel->scopeQuery(function($e) {
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('post_type','blog');
        })->limit(6);
        //related blog
        $relatedBlog = $this->postmodel->scopeQuery(function($e) use ($data){
            return $e->orderBy('name','asc')
                ->where('lang_code',$this->lang)
                ->where('status','active')
                ->where('id','!=',$data->id)
                ->where('category',$data->category);
        })->limit(6);

        //comment List
        $commentList = Comment::orderBy('created_at','desc')
            ->where('parent',0)
            ->where('status','active')
            ->where('post_id',$data->id)
            ->get()->take(5);

        return view('frontend::blog.detail',[
            'data'=>$data,
            'categoryChild'=>$categoryChild,
            'popularPost'=>$popularPost,
            'relatedBlog'=>$relatedBlog,
            'commentList'=>$commentList
        ]);
    }

}
