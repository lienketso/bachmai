<?php


namespace Diseases\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Post\Http\Requests\PostCreateRequest;
use Post\Http\Requests\PostEditRequest;
use Post\Repositories\PostRepository;

class HealthController extends BaseController
{
    protected $model;
    protected $cat;
    protected $langcode;
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->model = $postRepository;
        $this->cat = $categoryRepository;
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
                    ->where('post_type','health')
                    ->where('name','LIKE','%'.$name.'%')
                    ->where('lang_code',$this->langcode);
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')
                ->where('post_type','health')
                ->where('lang_code',$this->langcode)->paginate(10);
        }

        return view('wadmin-diseases::post.index',['data'=>$data]);
    }
    public function getCreate(){
        $catmodel = $this->cat;
        return view('wadmin-diseases::post.create',['catmodel'=>$catmodel]);
    }
    public function postCreate(PostCreateRequest $request){
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
            $input['post_type'] = 'health';
            $input['slug'] = $request->name;
            $input['user_post'] = Auth::id();
            $input['lang_code'] = $this->langcode;
            //c???u h??nh seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $data = $this->model->create($input);

            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::health.create.get')
                    ->with('create','Th??m d??? li???u th??nh c??ng');
            }
            return redirect()->route('wadmin::health.index.get',['id'=>$data->id])
                ->with('create','Th??m d??? li???u th??nh c??ng');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id){
        $data = $this->model->find($id);
        $catmodel = $this->cat;
        return view('wadmin-diseases::post.edit',['data'=>$data,'catmodel'=>$catmodel]);
    }

    function postEdit($id, PostEditRequest $request){
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
            $input['post_type'] = 'health';
            $input['slug'] = $request->name;
            $input['user_edit'] = Auth::id();
            //c???u h??nh seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::health.index.get')->with('edit','B???n v???a c???p nh???t d??? li???u');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }
    }

    function remove($id){
        try{
            $this->model->delete($id);
            return redirect()->back()->with('delete','B???n v???a x??a d??? li???u !');
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
