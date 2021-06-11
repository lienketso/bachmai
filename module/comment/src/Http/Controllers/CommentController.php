<?php


namespace Comment\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Comment\Http\Requests\CommentEditRequest;
use Comment\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    protected $model;
    protected $langcode;
    public function __construct(CommentRepository $commentRepository)
    {
       $this->model = $commentRepository;
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
                    ->where('post_type','post')
                    ->where('lang_code',$this->langcode)
                    ->where('name','LIKE','%'.$name.'%');
            })->paginate(10);
        }
        else{
            $data = $this->model->orderBy('created_at','desc')
                ->where('lang_code',$this->langcode)->paginate(10);
        }
        $model = $this->model;
        return view('wadmin-comment::index',['data'=>$data,'model'=>$model]);
    }

    function getEdit($id){
        $data = $this->model->find($id);
        return view('wadmin-comment::edit',['data'=>$data]);
    }

    function postEdit($id, CommentEditRequest $request){
        try{
            $input = $request->except(['_token']);
            $user = $this->model->update($input, $id);
            return redirect()->route('wadmin::comment.index.get')->with('edit','Bạn vừa cập nhật dữ liệu');
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
