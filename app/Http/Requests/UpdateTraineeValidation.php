<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTraineeValidation extends FormRequest
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
            'trainee_f_name' => 'required|string',
            'trainee_s_name' => 'required|string',
            'trainee_l_name' => 'required|string',
            'trainee_cpr' => 'required|numeric',
            'nationality' => 'required',
            'phone_1' => 'required|numeric',
            'phone_2' => 'required|numeric',
            'birthday' => 'required|date',
            'address' => 'required',
            'email' => 'required|email',
            'emergency_name' => 'required',
            'emergency_relationship' => 'required',
            'emergency_phone' => 'required|numeric',
            'trainee_qualification' => 'required',
            'trainee_specialization' => 'required',
            'gpa' => 'required|numeric',
            'instruction_lang' => 'required',  
        ];
    }

    // Method: Display Error Message: 
    public function messages(){
        return [
            'trainee_f_name.required' => 'This field is required!',
            'trainee_s_name.required' => 'This field is required!',
            'trainee_l_name.required' => 'This field is required!',
            'trainee_f_name.string' => 'This field must be string only!',
            'trainee_s_name.string' => 'This field must be string only!',
            'trainee_l_name.string' => 'This field must be string only!',
            'trainee_cpr.required' => 'This field is required!',
            'trainee_cpr.numeric' => 'Only numbers are allowed!',
            'nationality.required' => 'This field is required!',
            'phone_1.required' => 'This Field is Required!',
            'phone_1.numeric' => 'Only numbers are allowed!',
            'phone_2.required' => 'This field is required!',
            'phone_2.numeric' => 'Only numbers are allowed!',
            'birthday.required' => 'This field is required!',
            'birthday.date' => 'This field must be date only!',
            'address.required' => 'This field is required!',
            'email.required' => 'This field is required!',
            'email.email' => 'This field must be at email format!',
            'emergency_name.required' => 'This field is required!',
            'emergency_relationship.required' => 'This field is required!',
            'emergency_phone.required' => 'This field is required!',
            'emergency_phone.numeric' => 'Only numbers are allowed!',
            'trainee_qualification.required' => 'This field is required!',
            'trainee_specialization.required' => 'This field is required!',
            'gpa.required' => 'This field is required!',
            'gpa.numeric' => 'Only numbers are allowed!',
            'instruction_lang.required' => 'This field is required!',
        ];

    }

}
