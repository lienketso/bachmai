<?php


namespace Document\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Repositories\CategoryRepository;
use Document\Repositories\DocumentRepository;
use Illuminate\Http\Request;

class DocumentController extends BaseController
{
    protected $model;
    protected $cat;
    protected $langcode;
    public function __construct(DocumentRepository $documentRepository, CategoryRepository $categoryRepository)
    {
        $this->model = $documentRepository;
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
                    ->where('name','LIKE','%'.$name.'%')
                    ->where('lang_code',$this->langcode);
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')
                ->where('lang_code',$this->langcode)->paginate(10);
        }

        return view('wadmin-document::index',['data'=>$data]);
    }

    public function getCreate(){
        $categoryList = $this->cat->orderBy('name','asc')
            ->findWhere(['lang_code'=>$this->langcode,'type'=>'document']);
        return view('wadmin-document::create',['categoryList'=>$categoryList]);
    }
    public function postCreate(Request $request){
        try{
            $input = $request->except(['_token','continue_post']);
            if($request->hasFile('thumbnail')){
                $image = $request->thumbnail;
                $path = date('Y').'/'.date('m').'/'.date('d');
                $newnname = time().'-'.$image->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                $input['file_download'] = $path.'/'.$newnname;
                $input['file_name'] = $image->getClientOriginalName();
                $image->move('upload/'.$path,$newnname);
            }

            $input['lang_code'] = $this->langcode;
            //c???u h??nh seo
            $data = $this->model->create($input);

            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::document.create.get')
                    ->with('create','Th??m d??? li???u th??nh c??ng');
            }
            return redirect()->route('wadmin::document.index.get',['id'=>$data->id])
                ->with('create','Th??m d??? li???u th??nh c??ng');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id){
        $data = $this->model->find($id);
        $categoryList = $this->cat->orderBy('name','asc')
            ->findWhere(['lang_code'=>$this->langcode,'type'=>'document']);

        return view('wadmin-document::edit',['data'=>$data,'categoryList'=>$categoryList]);
    }

    function postEdit($id, Request $request){
        try{
            $input = $request->except(['_token']);

            if($request->hasFile('thumbnail')){
                $image = $request->thumbnail;
                $path = date('Y').'/'.date('m').'/'.date('d');
                $newnname = time().'-'.$image->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                $input['file_download'] = $path.'/'.$newnname;
                $input['file_name'] = $image->getClientOriginalName();
                $image->move('upload/'.$path,$newnname);
            }

            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::document.index.get')->with('edit','B???n v???a c???p nh???t d??? li???u');
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
