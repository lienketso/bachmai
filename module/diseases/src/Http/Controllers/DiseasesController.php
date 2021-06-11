<?php


namespace Diseases\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Diseases\Http\Requests\DiseasesCreateRequest;
use Diseases\Http\Requests\DiseasesEditRequest;
use Category\Models\Category;
use Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class DiseasesController extends BaseController
{
    protected $model;
    protected $langcode;
    public function __construct(CategoryRepository $categoryRepository)
    {
       $this->model = $categoryRepository;
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
                return $e->orderBy('id','desc')->where('lang_code',$this->langcode)
                    ->where('type','health')
                    ->where('name','LIKE','%'.$name.'%');
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')
                ->where('type','health')
                ->where('lang_code',$this->langcode)->paginate(10);
        }
        $model = $this->model;
        return view('wadmin-diseases::index',['data'=>$data,'model'=>$model]);
    }
    public function getCreate(){
       // $categories = $this->model->optionCategory(0,1,4,0,0);
        $model = $this->model;
        return view('wadmin-diseases::create',['model'=>$model]);
    }
    public function postCreate(DiseasesCreateRequest $request){
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
            $input['lang_code'] = $this->langcode;
            //cấu hình seo
            $input['slug'] = $request->name;
            //type of category
            $input['type'] = 'health';

            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $data = $this->model->create($input);

            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::diseases.create.get')
                    ->with('create','Thêm dữ liệu thành công');
            }
            return redirect()->route('wadmin::diseases.index.get',['id'=>$data->id])
                ->with('create','Thêm dữ liệu thành công');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id){
        $data = $this->model->find($id);
        $model = $this->model;
        return view('wadmin-diseases::edit',['data'=>$data,'model'=>$model]);
    }

    function postEdit($id, DiseasesEditRequest $request){
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
            //cấu hình seo
            $input['slug'] = $request->name;
            //type of category
            $input['type'] = 'health';
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::diseases.index.get')->with('edit','Bạn vừa cập nhật dữ liệu');
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
