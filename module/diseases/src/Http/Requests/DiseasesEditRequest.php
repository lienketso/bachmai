<?php


namespace Diseases\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class DiseasesEditRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name'=> 'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên danh mục'
        ];
    }
}
