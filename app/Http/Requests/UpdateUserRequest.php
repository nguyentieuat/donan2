<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email'  => 'required|max:40|unique:tb_user,email,'.$this->id,
            'name'   => 'required',
            'pass'   => 'required|regex:/^(?=.*[\p{Ll}])(?=.*[\p{Lu}])(?=.*\d)(?=.*[$@$!%*?&])[\p{Ll}‌​\p{Lu}\d$@$!%*?&]{8,}$/',
            'phone'  => 'required|regex:/^[0-9]+$/|min:10|max:11|unique:tb_user,phone,'.$this->id,
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
            'email.required'  => 'Email không được bỏ trống',
            'email.email'     => 'Email không đúng định dạng',
            'email.unique'    => 'Email đã tồn tại',
            'name.required'   => 'Tên không được bỏ trống',
            'pass.required'   => 'Mật khẩu không được bỏ trống',
            'pass.regex'      => 'Mật khẩu ít nhất 8 ký tự: tối thiểu 1 chữ hoa, 1 chữ thường, 1 số, 1 kí tự đặc biệt ',
            'phone.required'  => 'Số điện thoại không được trống',
            'phone.min'       => 'Số điện thoại phải ít nhất 10 số',
            'phone.max'       => 'Số điện thoại tối đa 11 số',
            'phone.regex'     => 'Số điện thoại phải là phải số',
            'phone.unique'    => 'Số điện thoại đã tồn tại',
        ];
    }
}
