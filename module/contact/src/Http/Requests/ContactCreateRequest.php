<?php


namespace Contact\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name'=> 'required',
            'email'=>'required|email'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập họ tên',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email không đúng định dạng'
        ];
    }
}
