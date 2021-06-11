<?php
namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Category\Repositories\CategoryRepository;
use Document\Repositories\DocumentRepository;
use Illuminate\Http\Request;

class DocumentController extends BaseController
{
    protected $model;
    protected $doc;
    protected $lang;
    public function __construct(CategoryRepository $categoryRepository,DocumentRepository $documentRepository)
    {
        $this->model = $categoryRepository;
        $this->doc = $documentRepository;
        $this->lang = session('lang');
    }

    public function index(){
	    $data = $this->model->orderBy('sort_order','asc')
            ->findWhere(['status'=>'active','lang_code'=>$this->lang,'type'=>'document']);

        //cấu hình các thẻ meta
        $meta_title = 'Danh sách tài liệu bệnh viện bạch mai';
        $meta_desc = 'Tất cả các tài liệu văn bản pháp quy được cập nhật tại danh mục tài liệu, cung cấp các file văn bản pháp quy tại bệnh viện bạch mai';
        $meta_url = route('frontend::document.index.get');
        $meta_thumbnail = public_url('admin/themes/images/no-image.png');

        view()->composer('frontend:*', function($view) use ($meta_title,$meta_desc,$meta_url,$meta_thumbnail){
            $view->with(['meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'meta_url'=>$meta_url,'meta_thumbnail'=>$meta_thumbnail]);
        });
        //end cấu hình thẻ meta

		return view('frontend::document.index',['data'=>$data]);
	}
	public function list($slug){
        $data = $this->model->findWhere(['slug'=>$slug])->first();

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

        $documentList = $this->doc->scopeQuery(function($e) use ($data){
            return $e->orderBy('name','asc')->where('category',$data->id);
        })->paginate(20);
		return view('frontend::document.list',['data'=>$data,'documentList'=>$documentList]);
	}

}
