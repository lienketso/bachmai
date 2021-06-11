<?php


namespace Donate\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class DonateCreateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'full_name'=> 'required',
            'amount'=>'required|numeric',
            'phone'=>'required',
        ];
    }

    public function messages(){
        return [
            'full_name.required'=>'Bạn chưa nhập họ tên',
            'amount.required'=>'Bạn chưa chọn số tiền ủng hộ',
            'amount.numeric'=>'Số tiền ủng hộ phải là số',
            'phone.required'=>'Vui lòng nhập số điện thoại',
        ];
    }
}
