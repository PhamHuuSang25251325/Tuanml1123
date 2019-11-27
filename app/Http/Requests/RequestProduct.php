<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name'=>'required|unique:products,pro_name,'.$this->id,
            'category_id'=>'required',
            'description'=>'required',
            'content'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            

        ];
    }

    public function messages()
    {
        return [
            'pro_name.required'=>'Bạn phải nhập tên sản phẩm',
            'pro_name.unique'=>'Tên sản phẩm đã tồn tại',
            'category_id.required'=>'Chưa chọn danh mục sản phẩm',
            'description.required'=>'Bạn phải nhập mô tả sản phẩm',
            'content.required'=>'Bạn phải nhập nội dung',
            'price.required'=>'Bạn phải nhập giá sản phẩm',
            'quantity.required'=>'Bạn phải nhập số lượng',
        ];
    }
}
