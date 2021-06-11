<?php


namespace Media\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Media\Repositories\MediaRepository;

class ApiMediaController extends BaseController
{
    protected $model;
    public function __construct(MediaRepository $mediaRepository)
    {
        $this->model = $mediaRepository;
    }

    public function uploadmutil(Request $request){
        $productid = $request->get('productid');
        $files_arr = array();
        if ($request->hasfile('media')) {
            $files = $request->file('media');
            foreach($files as $file) {
                $path = date('Y').'/'.date('m').'/'.date('d');
                $newnname = time().'-'.$file->getClientOriginalName();
                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                $file->move('upload/'.$path,$newnname);
                $files_arr[] = $path.'/'.$newnname;
                //insert data to media table
                $input = [
                  'table'=>'product',
                  'table_id'=>$productid,
                  'name'=> $path.'/'.$newnname,
                  'original_name'=> $path.'/'.$file->getClientOriginalName(),
                  'path_name'=> 'upload/'.$path.'/'.$newnname
                ];
                $this->model->create($input);
            }
        }
        echo \GuzzleHttp\json_encode($files_arr);
    }

    public function delete(Request $request){
        $img_id = $request->get('img_id');
        $link = $request->get('link');
        if (file_exists($link)){
            unlink($link);
        }
        $this->model->delete($img_id);
    }

}
