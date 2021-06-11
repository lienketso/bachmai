<?php


namespace Product\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Company\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Product\Repositories\ProductRepository;

class ApiProductController extends BaseController
{
    protected $model;
    protected $com;
    public function __construct(Request $request, ProductRepository $productRepository, CompanyRepository $companyRepository)
    {
        $this->model = $productRepository;
        $this->com = $companyRepository;
    }

    public function getCompany(Request $request){
        $return_arr = array();
        $keyword = $request->get('keyword');
        $listCompany = $this->com->orderBy('created_at','desc')
            ->where('name','LIKE','%'.$keyword.'%')
            ->where('lang_code',session('lang'))->limit(3)->get(['id','name']);
        foreach($listCompany as $key=>$val){
            $return_arr[] = array('id'=>$val->id,'name'=>$val->name);
        }
        return \GuzzleHttp\json_encode($return_arr);
    }


}
