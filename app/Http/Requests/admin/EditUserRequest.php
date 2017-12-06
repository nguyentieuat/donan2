<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email'  => 'required|max:40|unique:tb_user,email,' . $this->id,
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
            ];
    }
}
