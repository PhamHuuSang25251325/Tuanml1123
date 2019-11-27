<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPost extends FormRequest
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
            'post_title'=>'required|unique:posts,post_title,'.$this->id,
            'description'=>'required',
            'content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'post_title.required'=>'Bạn phải nhập tiêu đề',
            'post_title.unique'=>'Tiêu đề đã tồn tại',
            'description.required'=>'Bạn phải nhập mô tả',
            'content.required'=>'Bạn phải nhập nội dung',
        ];
    }
}
