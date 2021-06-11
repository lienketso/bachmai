<?php


namespace Doctor\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Http\Requests\CategoryCreateRequest;
use Category\Http\Requests\CategoryEditRequest;
use Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Post\Http\Requests\PostCreateRequest;
use Post\Http\Requests\PostEditRequest;
use Post\Repositories\PostRepository;

class KhoaController extends BaseController
{
    protected $model;
    protected $post;
    protected $langcode;
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->model = $categoryRepository;
        $this->post = $postRepository;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        if($id){
            $data = $this->model->scopeQuery(function ($e) use($id){
                return $e->orderBy('id','desc')->where('id',$id);
            })->paginate(1);
        }elseif($name){
            $data = $this->model->scopeQuery(function($e) use ($name){
                return $e->orderBy('id','desc')
                    ->where('type','doc')
                    ->where('name','LIKE','%'.$name.'%')
                    ->where('lang_code',$this->langcode);
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')
                ->where('type','doc')
                ->where('lang_code',$this->langcode)->paginate(10);
        }

        return view('wadmin-doctor::cat.index',['data'=>$data]);
    }
    public function getCreate(){
        return view('wadmin-doctor::cat.create');
    }
    public function postCreate(CategoryCreateRequest $request){
        try{
            $input = $request->except(['_token','continue_post']);
            if($request->hasFile('thumbnail')){
                $image = $request->thumbnail;
                $path = date('Y').'/'.date('m').'/'.date('d');
                $newnname = time().'-'.$image->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                $input['thumbnail'] = $path.'/'.$newnname;
                $image->move('upload/'.$path,$newnname);
            }
            $input['type'] = 'doc';
            $input['slug'] = $request->name;
            $input['lang_code'] = $this->langcode;
            //cấu hình seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }

            $data = $this->model->create($input);

            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::khoa.create.get')
                    ->with('create','Thêm dữ liệu thành công');
            }
            return redirect()->route('wadmin::khoa.index.get',['id'=>$data->id])
                ->with('create','Thêm dữ liệu thành công');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id){
        $data = $this->model->find($id);
        return view('wadmin-doctor::cat.edit',['data'=>$data]);
    }

    function postEdit($id, CategoryEditRequest $request){
        try{
            $input = $request->except(['_token']);

            if($request->hasFile('thumbnail')){
                $image = $request->thumbnail;
                $path = date('Y').'/'.date('m').'/'.date('d');
                $newnname = time().'-'.$image->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                $input['thumbnail'] = $path.'/'.$newnname;
                $image->move('upload/'.$path,$newnname);
            }
            $input['type'] = 'doc';
            $input['slug'] = $request->name;
            //cấu hình seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::khoa.index.get')->with('edit','Bạn vừa cập nhật dữ liệu');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }
    }

    function remove($id){
        try{
            $this->model->delete($id);
            return redirect()->back()->with('delete','Bạn vừa xóa dữ liệu !');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }
    }

    public function changeStatus($id){
        $input = [];
        $data = $this->model->find($id);
        if($data->status=='active'){
            $input['status'] = 'disable';
        }elseif ($data->status=='disable'){
            $input['status'] = 'active';
        }
        $this->model->update($input,$id);
        return redirect()->back();
    }
}
