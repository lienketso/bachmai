<?php


namespace Setting\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Setting\Models\Setting;
use Setting\Repositories\SettingRepositories;

class SettingController extends BaseController
{
    protected $model;
    protected $langcode;
    public function __construct(SettingRepositories $settingRepositories)
    {
        $this->model = $settingRepositories;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $setting = $this->model;
        $langcode = $this->langcode;
        return view('wadmin-setting::index',['setting'=>$setting,'language'=>$langcode]);
    }

    public function saveSetting($data){
        foreach($data as $key=>$val){
            Setting::updateOrCreate(['setting_key'=>$key],['setting_value'=>$val]);
        }
    }

    public function postIndex(Request $request){
        $data = $request->except('_token');
        if($request->hasFile('site_logo')){
            $image = $request->site_logo;
            $path = date('Y').'/'.date('m').'/'.date('d');
            $data['site_logo'] = $path.'/'.$image->getClientOriginalName();
            $image->move('upload/'.$path,$image->getClientOriginalName());
        }
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

    public function donate(){
        $langcode = $this->langcode;
        $setting = $this->model;
        return view('wadmin-setting::donate',['setting'=>$setting,'language'=>$langcode]);
    }

    public function postDonate(Request $request){
        $data = $request->except('_token');
        $this->saveSetting($data);
        return redirect()->back()->with('edit','Sửa cấu hình thành công !');
    }

}
