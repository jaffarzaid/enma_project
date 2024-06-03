<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerUpdateValidation extends FormRequest
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
            // Rules for validating updated trainer data: 
            'updated_trainer_name' => 'required|string|max:255',
            'updated_trainer_cpr' => 'required|numeric',
            'updated_license_code' => 'required|max:50',
            'updated_employment_status' => 'required|string',
            'updated_training_fields' => 'required|string',
            'updated_nationality' => 'required|string',
            'updated_issue_date' => 'required|date',
            'updated_expiry_date' => 'required|date'                     
        ];
    }

    // Method to display error messages: 
    public function messages()
    {
        return[
            
            // Validating updated trainer data messages: 
            'updated_trainer_name.required' => 'This field is required!',
            'updated_trainer_name.string' => 'This field must be only string!',
            'updated_trainer_name.max' => 'Name is too long!',
            'updated_trainer_cpr.required' => 'This field is required!',
            'updated_trainer_cpr.numeric' => 'This field must be only numeric!',
            'updated_license_code.required' => 'This field is required!',
            'updated_license_code.max' => 'The code length is long!',
            'updated_employment_status.required' => 'This field is required!',
            'updated_employment_status.string' => 'This field must be only string!',
            'updated_training_fields.required' => 'This field is required!',
            'updated_training_fields.string' => 'This field must be only string!',
            'updated_nationality.required' => 'This field is required!',
            'updated_nationality.string' => 'This field must be only string!',
            'updated_issue_date.required' => 'This field is required!',
            'updated_issue_date.date' => 'This field must be only date!',
            'updated_expiry_date.required' => 'This field is required!',
            'updated_expiry_date.date' => 'This field must be only date!',
        ];
        
    }
}
