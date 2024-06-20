<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReEnrollmentTraineeData extends FormRequest
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
            'trainee_cpr' => 'required|numeric|max_digits:15|exists:trainees,cpr', 
            'training_service_type' => 'required', 
            'selected_course' => 'required', 
            'sponsorship_name' => 'required', 
            'declaration_1' => 'required', 
            'declaration_2' => 'required', 
            'declaration_3' => 'required', 
            'stu_signature' => 'required', 
        ];
    }

    // Method: display Error Message: 
    public function messages(){
        return [
            'trainee_cpr.required' => 'This field is required!',
            'trainee_cpr.max' => 'You cannot add more than 15 digits!',
            'trainee_cpr.numeric' => 'Only numeric values are required!',
            'trainee_cpr.max_digits' => 'You cannot enter more than 15 digits!',
            'trainee_cpr.exists' => 'Your CPR does not existed in our records!',
            'training_service_type.required' => 'This field is required!',
            'sponsorship_name.required' => 'Only numeric values are required!',
            'declaration_1.required' => 'This field is required!',
            'declaration_2.required' => 'This field is required!',
            'declaration_3.required' => 'This field is required!',
            'stu_signature.required' => 'This field is required!'
        ];
    }
}
