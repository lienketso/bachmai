<?php


namespace Comment\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CommentEditRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'guest_name'=> 'required',
            'guest_mail'=>'required|email',
            'content'=>'required'
        ];
    }

    public function messages(){
        return [
            'guest_name.required'=>'Bạn chưa nhập tên danh mục',
            'guest_mail.required'=>'Please input email address',
            'email.email'=> 'Email not valid',
            'content.required'=> 'Bạn chưa nhập nội dung comment'
        ];
    }
}
