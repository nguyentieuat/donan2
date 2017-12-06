<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=> 'required',
            // 'image'=> 'required',
            // 'category'=> 'required',
            'description'=> 'required',
            'brand'=> 'required',
            'qty'=> 'required',
            'u_price'=> 'required',
            // 'p_price'=> 'required',
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
            'name.required' => 'Name required',
            // 'image.required' => 'Image required',
            // 'category.required' => 'Category required',
            'description.required' => 'Description is required',
            'brand.required' => 'Brand required',
            'qty.required' => 'Quantity required',
            'u_price.required' => 'Unit Price required',
            // 'promotion_price.required' => 'Promotion Price required',
        ];
    }
}
