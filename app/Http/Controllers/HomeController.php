<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TraineeDataValidation;
use App\Models\Course;
use App\Models\Trainee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Method: Display Job Seeker Registration Page: 
    public function DisplayJobSeekerRegistrationPage()
    {
        // Variable to get job seeker courses: 
        $job_seeker_courses = Course::where('is_job_seeker', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        return view('frontend.body.registration', compact('job_seeker_courses'));
    }

    // Method: Display Employee Registration Page: 
    public function DisplayEmployeeRegistrationPage()
    {

        // Variable to get employee courses:
        $employee_courses = Course::where('is_employee', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        return view('frontend.body.registration', compact('employee_courses'));
    }

    // Method: Display University Student Registration Page: 
    public function DisplayStudentRegistrationPage()
    {

        // Variable to get employee courses:
        $student_courses = Course::where('is_univ_student', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        return view('frontend.body.registration', compact('student_courses'));
    }

    // Method: Display Expat Registration Page: 
    public function DisplayExpatRegistrationPage()
    {

        // Variable to get expat courses:
        $expat_courses = Course::where('is_expat', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        return view('frontend.body.registration', compact('expat_courses'));
    }



    // Method: Store Student Data: 
    public function StoreStudentInfo(TraineeDataValidation $request)
    {
        // Hint: all data is validated into StudentDataValidation class

        // Get CPR File: 
        $cpr_file = $request->file('cpr_file');

        // Get Passport File: 
        $passport_file = $request->file('passport_file');

        // Renaming CPR: 
        $cpr_name = hexdec(uniqid()).'.'.$cpr_file->extension();

        // Renaming Passport:
        $passport_name = hexdec(uniqid()).'.'.$passport_file->extension();

        // Storing cpr into Storage folder: 
        $cpr_file->storeAs('upload/cpr_files/', $cpr_name);

        // Storing passport into Storage folder: 
        $passport_file->storeAs('upload/passport_files/', $passport_name);


        // Get Trainee's Education certificate: 
        $certificate_file = $request->file('edu_certificate');

        // Get Trainee Transcript: 
        $transcript_file = $request->file('edu_transcripts');

        // Renaming Certificate:  
        $certificate_name = hexdec(uniqid()).'.'.$certificate_file->extension();

        // Renaming transcript file: 
        $transcript_name = hexdec(uniqid()).'.'.$transcript_file->extension();

        // Storing Certificate into Storage folder:
        $certificate_file->storeAs('upload/trainee_certificates/', $certificate_name);

        // Storing Transcripts into Storage folder: 
        $transcript_file->storeAs('upload/trainee_transcripts/', $transcript_name);


        // Storing Trainee's data into Trainee Model: 
        Trainee::insert([
            'f_name' => $request->first_name,
            'second_name' => $request->second_name,
            'l_name' => $request->last_name,
            'gender' => $request->gender,
            'cpr' => $request->cpr,
            'nationality' => $request->nationality,
            'phone1' =>$request->phone_1,
            'phone2' =>$request->phone_2,
            'birthday' => $request->birthday_date,
            'address' => $request->home_address,
            'email' => $request->student_email,
            'emergency_name' => $request->emergency_name,
            'emergency_relationship' => $request->emr_relationship,
            'emergency_phone' => $request->emr_phone,
            'cpr_file' => 'upload/cpr_files/'.$cpr_name,
            'passport_file' => 'upload/passport_files/'.$passport_name,
            'qualification' => $request->qualification,
            'specialization' => $request->specialization,
            'gpa' => $request->student_gpa,
            'instruction_language' => $request->instruction_lang,
            'education_certificate_file' => 'upload/trainee_certificates/'.$certificate_name,
            'transcript_file' => 'upload/trainee_transcripts/'.$transcript_name,
            'pro_certificate_name' => $request->pro_cer_name,
            'pro_certificate_specialization' => $request->pro_cer_spec,
            'pro_awarding_body' => $request->pro_cer_awbd,
            'pro_year' => $request->pro_cer_year,
            'job_title' => $request->stu_job_title,
            'job_nature' => $request->stu_job_natu,
            'employer' => $request->employer,
            'num_of_experience' => $request->num_experience,
            'health_injury_disability' => isset($request->stu_injury_status) ? 1 : 0,
            'request_help' => isset($request->emergency_exit) ? 1 : 0

        ]); 

        return redirect()->route('');
    }
}
