<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AddNewsRequest extends FormRequest
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
        if(empty($this->id))
            $err = ['title' => 'required|unique:tb_news,title'];
        else
            $err = ['title' => 'required|unique:tb_news,title,'.$this->id];
        return $err;
    }

    public function messages()
    {
        return [
            'title.required' => 'Tên chuyên mục không được bỏ trống',
            'title.unique' => 'Tên chuyên mục đã tồn tại'
        ];
    }
}
