<?php
namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Post\Models\Post;
use Post\Repositories\PostRepository;

class DoctorController extends BaseController
{

    protected $cat;
    protected $post;
    protected $lang;
    public function __construct(Request $request, CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->lang = session('lang');
        $this->cat = $categoryRepository;
        $this->post = $postRepository;
    }

    public function search(){
        $catList = $this->cat->orderBy('name','asc')
            ->findWhere(['status'=>1,'lang_code'=>$this->lang,'type'=>'doc']);
		return view('frontend::doctor.index',['catList'=>$catList]);
	}

	public function result(Request $request){
        $letter = $request->get('letter');
        $name = $request->get('name');
        $category = $request->get('khoa');
        $q = Post::query();
        if(!is_null($letter)){
            $q = $q->where('first_name','LIKE', $letter.'%');
        }
        if(!is_null($name)){
            $q = $q->where('slug','LIKE', '%'.$name.'%');
        }
        if(!empty($category) || !is_null($category)){
//            $q = $q->whereHas('category', function ($e) use ($category){
//                return $e->where('category',$category);
//            });
            $q->where('category',$category);
        }
        $data = $q->orderBy('name','asc')
            ->where('lang_code',$this->lang)
            ->where('post_type','doc')
            ->where('status','active')->paginate(15);

        $catList = $this->cat->orderBy('name','asc')
            ->findWhere(['status'=>1,'lang_code'=>$this->lang,'type'=>'doc']);

		return view('frontend::doctor.result',[
		    'data'=>$data,
            'letter'=>$letter,
            'category'=>$category,
            'name'=>$name,
            'catList'=>$catList
        ]);
	}

	public function detail($slug){
        $data = $this->post->findWhere(['slug'=>$slug])->first();

        //cấu hình các thẻ meta
        $meta_title = $data->meta_title;
        $meta_desc = cut_string($data->meta_desc,190);
        $meta_url = route('frontend::doctor.detail.get',$data->slug);
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
        $this->post->update($input,$data->id);
        //end update count view

		return view('frontend::doctor.detail',['data'=>$data]);
	}

}
