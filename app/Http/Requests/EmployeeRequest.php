<?php

namespace App\Http\Requests;

use App\Enum\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'phone'=>'required|string',
            'department_id'=>'required|integer',
            'address'=>'nullable|string',
            'is_active'=>'nullable',
            'employee_type'=>[
                'required',
                Rule::in([UserType::$TEACHER, UserType::$EMPLOYEE]),
            ],
            'employee_code'=> 'required_if:employee_type,2',
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'اسم المدرس مطلوب',
          'phone.required'=>'رقم التليفون مطلوب',
          'department_id.required'=>'القسم التابع له المدرس مطلوب',
          'employee_code'=>'كود الموظف مطلوب في حاله اختيار النزع موظف',
        ];
    }
}
