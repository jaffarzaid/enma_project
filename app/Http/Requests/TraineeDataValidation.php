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
                'unique:trainees,cpr',
                function ($attribute, $value, $fail) use ($cprLength) {
                    $selected_nationality = $this->nationality;

                    if (!empty($selected_nationality) && array_key_exists($selected_nationality, $cprLength)) {
                        if (!is_numeric($value)) {
                            $fail('Invalid CPR format. Please enter a valid numeric CPR.');
                            return;
                        }

                        if (strlen((string) $value) !== $cprLength[$selected_nationality]) {
                            $fail('Your CPR is not valid!');
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
            'trainee_email' => 'required|email',
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
            'training_service_type' => 'required',
            'selected_course' => 'required',
            'sponsorship_name' => 'required',
            'declaration_1' => 'required',
            'declaration_2' => 'required',
            'declaration_3' => 'required',
            'stu_signature' => 'required',
        ];
    }

    // Method: Display Error Messages: 
    public function messages()
    {
        return [
            'first_name.required' => 'This Field is Required!',
            'first_name.max' => 'Name is Too Long!',
            'second_name.required' => 'This Field is Required!',
            'second_name.max' => 'Name is Too Long!',
            'last_name.required' => 'This Field is Required!',
            'last_name.max' => 'Name is Too Long!',
            'cpr.required' => 'This Field is Required!',
            'cpr.unique' => 'You are already registered!',
            'gender.required' => 'This Field is Required!',
            'phone_1.required' => 'This Field is Required!',
            'phone_1.numeric' => 'Only numbers are allowed!',
            'phone_2.required' => 'This Field is Required!',
            'phone_2.numeric' => 'This Field is Required!',
            'birthday_date.required' => 'This Field is Required!',
            'birthday_date.date' => 'Only date is allowed!',
            'home_address.required' => 'This Field is Required!',
            'trainee_email.required' => 'This Field is Required!',
            'trainee_email.email' => 'This is not an email form!',
            'emergency_name.required' => 'This Field is Required!',
            'emr_relationship.required' => 'This Field is Required!',
            'emr_phone.required' => 'This Field is Required!',
            'emr_phone.numeric' => 'Only numbers are allowed!',
            'cpr_file.required' => 'This Field is Required!',
            'cpr_file.mimes' => 'Only PDF file is allowed!',
            'cpr_file.max' => 'File size should not exceeds 3MB!',
            'passport_file.required' => 'This Field is Required!',
            'passport_file.mimes' => 'Only PDF file is allowed!',
            'passport_file.max' => 'File size should not exceeds 3MB!',
            'qualification.required' => 'This Field is Required!',
            'specialization.required' => 'This Field is Required!',
            'student_gpa.required' => 'This Field is Required!',
            'student_gpa.numeric' => 'Only numbers are allowed!',
            'instruction_lang.required' => 'This Field is Required!',
            'edu_certificate.required' => 'This Field is Required!',
            'edu_certificate.mimes' => 'Only PDF file is allowed!',
            'edu_certificate.max' => 'File size should not exceeds 3MB!',
            'edu_transcripts.required' => 'This Field is Required!',
            'edu_transcripts.mimes' => 'Only PDF file is allowed!',
            'edu_transcripts.max' => 'File size should not exceeds 3MB!',
            'stu_injury_status.required' => 'This Field is Required!',
            'emergency_exit.required' => 'This Field is Required!',
            'health_injury_disability_file.required' => 'This Field is Required!',
            'health_injury_disability_file.mimes' => 'Only PDF file is allowed!',
            'health_injury_disability_file.max' => 'File size should not exceeds 3MB!',
            'training_service_type.required' => 'This Field is Required!',
            'selected_course.required' => 'This Field is Required!',
            'sponsorship_name.required' => 'This Field is Required!',
            'declaration_1.required' => 'This Field is Required!',
            'declaration_2.required' => 'This Field is Required!',
            'declaration_3.required' => 'This Field is Required!',
            'stu_signature.required' => 'This Field is Required!',
        ];
    }
}
