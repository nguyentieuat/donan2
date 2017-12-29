<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    =>'required',
            'email'   =>'required|unique:tb_user,email,'.$this->id,
            'phone'   =>'required|regex:/^[0-9]+$/|min:10|max:11|unique:tb_user,phone,'.$this->id,
            'address' =>'required',
            'gender'  =>'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'    =>'Tên không được bỏ trống',
            'email.required'   =>'Email không được bỏ trống',
            'email.unique'    => 'Email đã tồn tại',
            'phone.required'   =>'Phone khẩu không được bỏ trống',
            'phone.min'       => 'Số điện thoại phải ít nhất 10 số',
            'phone.max'       => 'Số điện thoại tối đa 11 số',
            'phone.regex'     => 'Số điện thoại phải là phải số',
            'phone.unique'    => 'Số điện thoại đã tồn tại',
            'address.required' =>'Địa chỉ không được bỏ trống',
            'gender.required'  =>'Giới tính không được bỏ trống',
            ];
    }
}
