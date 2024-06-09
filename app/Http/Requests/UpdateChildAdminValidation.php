<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChildAdminValidation extends FormRequest
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
            'emp_name' => 'required|max:50',
            'emp_email' => 'required|max:50',
            'password' => 'max:15|confirmed',
        ];
    }


    // Method to display Error Messages: 
    public function messages()
    {
        return [
            'emp_name.required' => 'This Field is Required!',
            'emp_name.max' => 'Name is too long!',
            'emp_email.max' => 'Email is too long!',
            'password.required' => 'This Field is Required!',
            'password.max' => 'Password must not exceed 15 characters!',
            'password.confirmed' => 'Your password does not match!',
            'password_confirmation.required' => 'This Field is Required!',
        ];
    }
}
