<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraineeDataValidation extends FormRequest
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
        $cprLength = [
            'Bahraini' => 9,
            'Kuwaiti' => 12,
            'Omani' => 9,
            'Qatari' => 11,
            'Saudi' => 10,
            'Emirati' => 15
        ];

        return [
            'first_name' => 'required|max:15',
            'second_name' => 'required|max:15',
            'last_name' => 'required|max:15',
            'nationality' => 'required',
            'cpr' => [
                'required',
                function ($value, $fail) use ($cprLength) {
                    $selected_nationality = $this->nationality;

                    if (!empty ($selected_nationality) && array_key_exists($selected_nationality, $cprLength)) {
                        if (!is_numeric($value)) {
                            $fail('Invalid CPR format. Please enter a valid numeric CPR.');
                            return;
                        }

                        if (strlen((string) $value) !== $cprLength[$selected_nationality]) {
                            $fail('Your CPR is not Valid!');
                        }
                    } else {
                        $fail('Invalid nationality or missing CPR length information.');
                    }
                }
            ],
            'gender' => 'required',
            'phone_1' => 'required|numeric',
            'phone_2' => 'required|numeric',
            'birthday_date' => 'required|date',
            'home_address' => 'required',
            'student_email' => 'required|email',
            'emergency_name' => 'required',
            'emr_relationship' => 'required',
            'emr_phone' => 'required|numeric',
            'cpr_file' => 'required|mimes:pdf|max:3072',
            'passport_file' => 'required|mimes:pdf|max:3072',
            'qualification' => 'required',
            'specialization' => 'required',
            'student_gpa' => 'required|numeric',
            'instruction_lang' => 'required',
            'edu_certificate' => 'required|mimes:pdf|max:3072',
            'edu_transcripts' => 'required|mimes:pdf|max:3072',
            'stu_injury_status' => 'required',
            'emergency_exit' => 'required',
            'health_injury_disability_file' => 'required|mimes:pdf|max:3072',
            'selected_course' => 'required',
            'sponsorship_value' => 'required',
            'declaration_1' => 'required',
            'declaration_2' => 'required',
            'declaration_3' => 'required',
            'stu_signature' => 'required',
        ];
    }

    // Returning Messages: 
    public function messages()
    {
        return [
            'first_name.required' => 'This Field is required!',
            'first_name.max' => 'Only 15 characters is allowed!',
            'second_name.required' => 'This Field is required!',
            'second_name.max' => 'Only 15 characters is allowed!',
            'last_name.required' => 'This Field is required!',
            'last_name.max' => 'Only 15 characters is allowed!',
            'nationality.required' => 'This Field is required!',
            'cpr.required' => 'This Field is required!',
            'gender.required' => 'This Field is required!',
            'phone_1.required' => 'This Field is required!',
            'phone_2.required' => 'This Field is required!',
            'phone_1.numeric' => 'This field must be numeric!',
            'phone_2.numeric' => 'This field must be numeric!',
            'birthday_date.required' => 'This Field is required!',
            'birthday_date.date' => 'This Field must be date format!',
            'home_address.required' => 'This Field is required!',
            'student_email.required' => 'This Field is required!',
            'student_email.email' => 'The email format is invalid!',
            'emergency_name.required' => 'This Field is required!',
            'emr_relationship.required' => 'This Field is required!',
            'emr_phone.required' => 'This Field is required!',
            'emr_phone.numeric' => 'This field must be numeric!',
            'cpr_file.required' => 'This Field is required!',
            'cpr_file.mimes' => 'Only PDF file is allowed!',
            'cpr_file.max' => 'File is too big, 3MB is the maximum size!',
            'passport_file.required' => 'This Field is required!',
            'passport_file.mimes' => 'Only PDF file is allowed!',
            'passport_file.max' => 'File is too big, 3MB is the maximum size!',
            'qualification.required' => 'This Field is required!',
            'specialization.required' => 'This Field is required!',
            'student_gpa.required' => 'This Field is required!',
            'student_gpa.numeric' => 'This field must be numeric!',
            'instruction_lang.required' => 'This Field is required!',
            'edu_certificate.required' => 'This Field is required!',
            'edu_certificate.mimes' => 'Only PDF file is allowed!',
            'edu_certificate.max' => 'File is too big, 3MB is the maximum size!',
            'edu_transcripts.required' => 'This Field is required!',
            'edu_transcripts.mimes' => 'Only PDF file is allowed!',
            'edu_transcripts.max' => 'File is too big, 3MB is the maximum size!',
            'stu_injury_status.required' => 'This Field is required!',
            'emergency_exit.required' => 'This Field is required!',
            'health_injury_disability_file.required' => 'This Field is required!',
            'health_injury_disability_file.mimes' => 'Only PDF file is allowed!',
            'health_injury_disability_file.max' => 'File is too big, 3MB is the maximum size!',
            'selected_course.required' => 'This Field is required!',
            'declaration_1.required' => 'This Field is required!',
            'declaration_2.required' => 'This Field is required!',
            'declaration_3.required' => 'This Field is required!',
            'stu_signature.required' => 'This Field is required!',
        ];
    }
}
