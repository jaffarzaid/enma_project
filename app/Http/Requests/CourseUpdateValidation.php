<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'awarding_body' => 'required|max:90',
            'course_code' => 'required|max:10',
            'course_name' => 'required|max:90',
            'license_code' => 'required|max:90',
            'num_of_hours' => 'required|numeric',
            'mol_approval' => 'required|string',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',          
        ];
    }

    // Method: Display Error Messages: 
    public function messages()
    {
        return [
            'awarding_body.required' => 'This Field is Required!',
            'awarding_body.max' => 'Awarding Body is Too Long!',
            'course_code.required' => 'This Field is Required!',
            'course_code.max' => 'Course Code is Too Long!',
            'course_code.unique' => 'Course Code is Already Existed!',
            'course_name.required' => 'This Field is Required!',
            'course_name.max' => 'Course Name is Too Long!',
            'course_name.unique' => 'Course Name is Already Existed!',
            'license_code.required' => 'This Field is Required!',
            'license_code.max' => 'License Code is Already Existed!',
            'license_code.unique' => 'License Code is Too Long!',
            'num_of_hours.required' => 'This Field is Required!',
            'num_of_hours.numeric' => 'You Must Add Only Numeric!',
            'mol_approval.required' => 'This Field is Required!',
            'mol_approval.string' => 'This Field must be only string!',
            'issue_date.required' => 'This field is required!',
            'issue_date.date' => 'This field must be only date!',
            'expiry_date.required' => 'This field is required!',
            'expiry_date.date' => 'This field must be only date!',
        ];
    }
}
