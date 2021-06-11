<?php


namespace Document\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class DocumentCreateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name'=> 'required',
            'category'=> 'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tiêu đề',
            'category.required'=>'Bạn chưa nhập danh mục'
        ];
    }
}
