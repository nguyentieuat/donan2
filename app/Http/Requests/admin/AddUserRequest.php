<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name'  => 'required|max:40',
            'email'  => 'required|max:40|unique:tb_user,email',
            'pass'   => 'required|regex:/^(?=.*[\p{Ll}])(?=.*[\p{Lu}])(?=.*\d)(?=.*[$@$!%*?&])[\p{Ll}‌​\p{Lu}\d$@$!%*?&]{8,}$/',
            'repass' => 'required|same:pass',
            'phone'  => 'required|regex:/^[0-9]+$/|min:10|max:11|unique:tb_user,phone',
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
            'name.required'  => 'Name không được bỏ trống',
            'name.max'        => 'Name tối đa 16 ký tự',
            'email.required'  => 'Email không được bỏ trống',
            'email.email'     => 'Email không đúng định dạng',
            'email.unique'    => 'Email đã tồn tại',
            'pass.required'   => 'Mật khẩu không được bỏ trống',
            'pass.regex'      => 'Mật khẩu ít nhất 8 ký tự: tối thiểu 1 chữ hoa, 1 chữ thường, 1 số, 1 kí tự đặc biệt ',
            'repass.required' => 'Hãy nhập lại mật khẩu',
            'repass.same'     => 'Mật khẩu nhập lại không khớp',
            'phone.required'  => 'Số điện thoại không được trống',
            'phone.min'       => 'Số điện thoại ít nhất 10 số',
            'phone.max'       => 'Số điện thoại tối đa 11 số',
            'phone.regex'     => 'Số điện thoại phải là số',
            'phone.unique'    => 'Số điện thoại đã tồn tại',
        ];
    }
}
