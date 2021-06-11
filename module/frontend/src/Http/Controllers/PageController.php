<?php


namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Http\Request;
use Post\Repositories\PostRepository;

class PageController extends BaseController
{
    protected $lang;
    protected $model;

    public function __construct(Request $request, PostRepository $postRepository)
    {
        $this->model = $postRepository;
        $this->lang = session('lang');
    }

    public function index($slug){
        $data = $this->model->findWhere(['slug'=>$slug,'post_type'=>'page'])->first();

        //cấu hình các thẻ meta
        $meta_title = $data->meta_title;
        $meta_desc = cut_string($data->meta_desc,190);
        $meta_url = route('frontend::page.detail.get',$data->slug);
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
        $this->model->update($input,$data->id);
        //end update count view

        return view('frontend::page.index',['data'=>$data]);
    }

}
