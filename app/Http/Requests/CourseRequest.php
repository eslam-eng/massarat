<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name'=>'required|string',
            'department_id'=>'required|integer',
            'price'=>'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'اسم الكورس مطلوب',
          'department_id.required'=>'القسم التابع له الكورس مطلوب',
          'price.required'=>'سعر الكورس مطلوب'
        ];
    }
}
