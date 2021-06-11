<?php
namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Post\Repositories\PostRepository;

class DiseasesController extends BaseController
{
    protected $post;
    protected $cat;
    protected $lang;
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->post = $postRepository;
        $this->cat = $categoryRepository;
        $this->lang = session('lang');
    }

    public function index(Request $request){
        $letter = $request->get('letter');
        $topic = $request->get('topic');
        $data = array();
        if($letter){
            $data = $this->post->scopeQuery(function ($e) use ($letter){
                return $e->orderBy('name','asc')
                    ->where('status','active')
                    ->where('post_type','health')
                    ->where('lang_code',$this->lang)
                    ->where('name','LIKE',$letter.'%');
            })->paginate(50);
        }

        $topicInfo = [];
        if($topic){
            $topicInfo = $this->cat->findWhere(['slug'=>$topic])->first();
            $data = $this->post->scopeQuery(function($e) use ($topicInfo){
                return $e->orderBy('name','asc')
                    ->where('status','active')
                    ->where('category',$topicInfo->id);
            })->paginate(50);
        }

        //danh mục sidebar
        $catSidebar = $this->cat->with('post')->findWhere([
            'type'=>'post',
            'status'=>'active',
            'lang_code'=>$this->lang,
            'display'=>1
        ])->first();

        //cấu hình các thẻ meta
        $meta_title = 'Danh sách các bệnh lý và triệu chứng';
        $meta_desc = 'Các bệnh lý và triệu chứng thường gặp, nơi chia sẻ thông tin về bệnh lý sức khỏe tại bệnh viện bạch mai';
        $meta_url = route('frontend::diseases.index.get');
        $meta_thumbnail = public_url('admin/themes/images/no-image.png');

        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

		return view('frontend::diseases.index',[
		    'data'=>$data,
            'letter'=>$letter,
            'topic'=>$topicInfo,
            'catSidebar'=>$catSidebar
        ]);
	}

    public function topic(){
        $data = $this->cat->with('post')->findWhere(['status'=>'active','type'=>'health','lang_code'=>$this->lang])->all();
        //danh mục sidebar
        $catSidebar = $this->cat->with('post')->findWhere([
            'type'=>'health',
            'status'=>'active',
            'lang_code'=>$this->lang,
            'display'=>1
        ])->first();

        //cấu hình các thẻ meta
        //cấu hình các thẻ meta
        $meta_title = 'Danh sách chủ đề các bệnh lý và triệu chứng';
        $meta_desc = 'Các chủ đề bệnh lý và triệu chứng thường gặp, nơi chia sẻ thông tin về bệnh lý sức khỏe tại bệnh viện bạch mai';
        $meta_url = route('frontend::diseases.topic.get');
        $meta_thumbnail = public_url('admin/themes/images/no-image.png');
        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

        return view('frontend::diseases.topic',['data'=>$data,'catSidebar'=>$catSidebar]);
    }

	public function detail($slug){
        $data = $this->post->findWhere(['slug'=>$slug])->first();
        if(!$data){
            return abort(404);
        }
        $related = $this->post->scopeQuery(function ($e) use ($data){
            return $e->orderBy('name','asc')->where('id','!=',$data->id)
                ->where('lang_code',$this->lang)
                ->where('post_type','health');
        })->limit(5);

        $catSidebar = $this->cat->with('post')->findWhere([
            'type'=>'post',
            'status'=>'active',
            'lang_code'=>$this->lang,
            'display'=>1
        ])->first();

        //cấu hình các thẻ meta
        $meta_title = $data->meta_title;
        $meta_desc = cut_string($data->meta_desc,190);
        $meta_url = route('frontend::diseases.detail.get',$data->slug);
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

		return view('frontend::diseases.detail',['data'=>$data,'related'=>$related,'catSidebar'=>$catSidebar]);
	}

}
