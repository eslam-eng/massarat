<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseSubscriptionRequest extends FormRequest
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
            'student_id'=>'required|integer',
            'course_id'=>'required|integer',
            'teacher_id'=>'required|integer',
            'payment'=>'required|integer',
            'employee_code'=>'required|string',
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
