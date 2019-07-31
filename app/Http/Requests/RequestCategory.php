<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RequestCategory extends FormRequest
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
            //'category_product_name'=> 'requied'
           // 'category_product_name'=> 'unique'
        ];
    }

    public function messages()
    {
        return [
           // 'category_product_name.requied'=> 'Trường này không được để trống'
             //'category_product_name.unique'=> 'Tên danh mục đã tồn tại'
        ];
    }
}
