<?php


namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Comment\Models\Comment;
use Illuminate\Http\Request;
use Post\Repositories\PostRepository;

class VideoController extends BaseController
{
    protected $model;
    protected $lang;
    public function __construct(PostRepository $postRepository)
    {
        $this->lang = session('lang');
        $this->model = $postRepository;
    }
    public function index(){
        $data = $this->model->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('post_type','video')
                ->where('lang_code',$this->lang);
        })->paginate(10);

        //cấu hình các thẻ meta
        $meta_title = 'Video clips mới nhất tại bệnh viện bạch mai';
        $meta_desc = 'Tất cả những videp mới nhất được bệnh viện bạch mai tổng hợp liên quan đến sức khỏe, đời sống, tình hình dịch bệnh covid';
        $meta_url = route('frontend::video.index.get');
        $meta_thumbnail = public_url('admin/themes/images/no-image.png');

        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

        return view('frontend::video.index',['data'=>$data]);
    }

    public function detail($slug){
        $data = $this->model->findWhere(['slug'=>$slug])->first();

        //cấu hình các thẻ meta
        $meta_title = $data->meta_title;
        $meta_desc = cut_string($data->meta_desc,190);
        $meta_url = route('frontend::video.detail.get',$data->slug);
        if($data->thumbnail!=''){
            $meta_thumbnail = upload_url($data->thumbnail);
        }else{
            $meta_thumbnail = public_url('admin/themes/images/no-image.png');
        }
        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

        $relateVideo = $this->model->scopeQuery(function($e) use ($data){
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('post_type','video')
                ->where('lang_code',$this->lang)
                ->where('id','!=',$data->id);
        })->limit(6);

        //comment List
        $commentList = Comment::orderBy('created_at','desc')
            ->where('parent',0)
            ->where('status','active')
            ->where('post_id',$data->id)
            ->get()->take(5);

        $input['count_view'] = $data->count_view+1;
        $this->model->update($input,$data->id);
        //end update count view
        return view('frontend::video.detail',[
            'data'=>$data,
            'relateVideo'=>$relateVideo,
            'commentList'=>$commentList
        ]);
    }

}
