<?php


namespace Video\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Media\Repositories\MediaRepository;

class AdverController extends BaseController
{
    protected $model;
    protected $langcode;
    public function __construct(MediaRepository $mediaRepository)
    {
        $this->model = $mediaRepository;
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
                    ->where('table','adver')
                    ->where('name','LIKE','%'.$name.'%')
                    ->where('lang_code',$this->langcode);
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')
                ->where('table','adver')
                ->where('lang_code',$this->langcode)->paginate(10);
        }

        return view('wadmin-video::index',['data'=>$data]);
    }
    public function getCreate(){
        return view('wadmin-video::create');
    }
    public function postCreate(Request $request){
        try{
            $input = $request->except(['_token','continue_post']);
            if($request->hasFile('thumbnail')){
                $image = $request->thumbnail;
                $path = date('Y').'/'.date('m').'/'.date('d');
                $newnname = time().'-'.$image->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                $input['path_name'] = $path.'/'.$newnname;
                $input['original_name'] = $image->getClientOriginalName();
                $image->move('upload/'.$path,$newnname);
            }

            $input['table'] = 'adver';
            $input['lang_code'] = $this->langcode;
            //c???u h??nh seo
            $data = $this->model->create($input);

            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::adver.create.get')
                    ->with('create','Th??m d??? li???u th??nh c??ng');
            }
            return redirect()->route('wadmin::adver.index.get',['id'=>$data->id])
                ->with('create','Th??m d??? li???u th??nh c??ng');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id){
        $data = $this->model->find($id);
        return view('wadmin-video::edit',['data'=>$data]);
    }

    function postEdit($id, Request $request){
        try{
            $input = $request->except(['_token']);

            if($request->hasFile('thumbnail')){
                $image = $request->thumbnail;
                $path = date('Y').'/'.date('m').'/'.date('d');
                $newnname = time().'-'.$image->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                $input['path_name'] = $path.'/'.$newnname;
                $input['original_name'] = $image->getClientOriginalName();
                $image->move('upload/'.$path,$newnname);
            }
            $input['table'] = 'adver';

            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::adver.index.get')->with('edit','B???n v???a c???p nh???t d??? li???u');
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
