<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendValidation extends FormRequest
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
            'trainer_name' => 'required|string|max:255|unique:trainers,name',
            'trainer_cpr' => 'required|numeric|unique:trainers,cpr',
            'license_code' => 'required|unique:trainers,license_code|max:50',
            'employment_status' => 'required|string',
            'training_fields' => 'required|string',
            'nationality' => 'required|string',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',          
        ];
    }

    // Method to display error messages: 
    public function messages()
    {
        return[
            // Validating Trainer Data
            'trainer_name.required' => 'This field is required!',
            'trainer_name.string' => 'This field must be only string!',
            'trainer_name.max' => 'Name is too long!',
            'trainer_name.unique' => 'This name already existed!',
            'trainer_cpr.required' => 'This field is required!',
            'trainer_cpr.min' => 'CPR must be 9  digits at least!',
            'trainer_cpr.numeric' => 'This field must be only numeric!',
            'trainer_cpr.unique' => 'This CPR is already existed!',
            'license_code.required' => 'This field is required!',
            'license_code.unique' => 'This code is already existed!',
            'license_code.max' => 'The code length is long!',
            'employment_status.required' => 'This field is required!',
            'employment_status.string' => 'This field must be only string!',
            'training_fields.required' => 'This field is required!',
            'nationality.required' => 'This field is required!',
            'nationality.string' => 'This field must be only string!',
            'issue_date.required' => 'This field is required!',
            'issue_date.date' => 'This field must be only date!',
            'expiry_date.required' => 'This field is required!',
            'expiry_date.date' => 'This field must be only date!',
           
            //

        ];
        
    }
}
