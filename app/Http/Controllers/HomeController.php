<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReEnrollmentTraineeData;
use Illuminate\Http\Request;
use App\Http\Requests\TraineeDataValidation;
use App\Models\Course;
use App\Models\NonBahrainiRegisteredCourse;
use App\Models\PreparatoryRegisteredCourses;
use App\Models\TamkeenRegisteredCourses;
use App\Models\Trainee;
use Carbon\Carbon;

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

        // Variable to get Trainee Type: 
        $trainee_type = 'Job Seeker';

        return view('frontend.body.registration', compact('job_seeker_courses', 'trainee_type'));
    }

    // Method: Display Employee Registration Page: 
    public function DisplayEmployeeRegistrationPage()
    {

        // Variable to get employee courses:
        $employee_courses = Course::where('is_employee', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        // Variable to get Trainee Type: 
        $trainee_type = 'Employee';

        return view('frontend.body.registration', compact('employee_courses', 'trainee_type'));
    }

    // Method: Display University Student Registration Page: 
    public function DisplayStudentRegistrationPage()
    {

        // Variable to get employee courses:
        $student_courses = Course::where('is_univ_student', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        // Variable to get Trainee Type: 
        $trainee_type = 'University Student';

        return view('frontend.body.registration', compact('student_courses', 'trainee_type'));
    }

    // Method: Display Expat Registration Page: 
    public function DisplayExpatRegistrationPage()
    {

        // Variable to get expat courses:
        $expat_courses = Course::where('is_expat', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        // Variable to get Trainee Type: 
        $trainee_type = 'Expat';

        return view('frontend.body.registration', compact('expat_courses', 'trainee_type'));
    }



    // Method: Store Student Data: 
    public function StoreTraineeInfo(TraineeDataValidation $request)
    {
        // Hint: all data is validated into StudentDataValidation class

        // Variable to get Trainee Type: 
        $traineeType = $request->trainee_type;
        // dd($traineeType);

        // Get CPR File: 
        $cpr_file = $request->file('cpr_file');
        // dd($cpr_file);

        // Get Passport File: 
        $passport_file = $request->file('passport_file');

        // Renaming CPR: 
        $cpr_name = hexdec(uniqid()) . '.' . $cpr_file->extension();

        // Renaming Passport:
        $passport_name = hexdec(uniqid()) . '.' . $passport_file->extension();

        // Storing cpr into Storage folder: 
        $cpr_file->storeAs('upload/cpr_files/', $cpr_name);

        // Storing passport into Storage folder: 
        $passport_file->storeAs('upload/passport_files/', $passport_name);


        // Get Trainee's Education certificate: 
        $certificate_file = $request->file('edu_certificate');

        // Get Trainee Transcript: 
        $transcript_file = $request->file('edu_transcripts');

        // Renaming Certificate:  
        $certificate_name = hexdec(uniqid()) . '.' . $certificate_file->extension();

        // Renaming transcript file: 
        $transcript_name = hexdec(uniqid()) . '.' . $transcript_file->extension();

        // Storing Certificate into Storage folder:
        $certificate_file->storeAs('upload/trainee_certificates/', $certificate_name);

        // Storing Transcripts into Storage folder: 
        $transcript_file->storeAs('upload/trainee_transcripts/', $transcript_name);

        // Get a document of disability/injury file: 
        $injury_file_name = null;
        if ($request->hasFile('health_injury_disability_file')) {

            $injury_file = $request->file('health_injury_disability_file');

            // Renaming injury file: 
            $injury_file_name = hexdec(uniqid()) . '.' . $injury_file->extension();

            // Storing Files into Storage folder: 
            $injury_file->storeAs('upload/injury_files/', $injury_file_name);
        }

        // Variable to store declaration text: 
        $declarationText = "I confirm that the information that I have provided in this application is accurate, correct and complete and that the documents submitted along with this application form are genuine. I understand that withholding any information requested or giving false information may make me ineligible for enrollment, admission, or compel my expulsion from the institution. I, also, hereby acknowledge that I have read and understood the Enma Terms and Conditions and Enma Code of Conduct in its entirety and agree to abide by them. I understand and agree that this declaration is final and irrevocable, and that it is not subject to cancellation or amendments.";

        // Storing Trainee's data into Trainee Model: 
        $trainee_id = Trainee::insertGetId([
            'f_name' => $request->first_name,
            's_name' => $request->second_name,
            'l_name' => $request->last_name,
            'gender' => $request->gender,
            'cpr' => $request->cpr,
            'nationality' => $request->nationality,
            'phone1' => $request->phone_1,
            'phone2' => $request->phone_2,
            'birthday' => $request->birthday_date,
            'address' => $request->home_address,
            'email' => $request->trainee_email,
            'emergency_name' => $request->emergency_name,
            'emergency_relationship' => $request->emr_relationship,
            'emergency_phone' => $request->emr_phone,
            'cpr_file' => 'upload/cpr_files/' . $cpr_name,
            'passport_file' => 'upload/passport_files/' . $passport_name,
            'qualification' => $request->qualification,
            'specialization' => $request->specialization,
            'gpa' => $request->student_gpa,
            'instruction_language' => $request->instruction_lang,
            'education_certificate_file' => 'upload/trainee_certificates/' . $certificate_name,
            'transcript_file' => 'upload/trainee_transcripts/' . $transcript_name,
            'studying_status' => $request->studying_status,
            'study_status_specification' => $request->study_status_specification,
            'pro_certificate_name' => $request->pro_cer_name,
            'pro_certificate_specialization' => $request->pro_cer_spec,
            'pro_awarding_body' => $request->pro_cer_awbd,
            'pro_year' => $request->filled('pro_cer_year') ? (int) $request->pro_cer_year : null,
            'job_title' => $request->stu_job_title,
            'job_nature' => $request->stu_job_natu,
            'employer' => $request->employer,
            'num_of_experience' => $request->filled('num_experience') ? (int) $request->num_experience : null,
            'health_injury_disability' => isset($request->stu_injury_status) ? 1 : 0,
            'request_help' => isset($request->emergency_exit) ? 1 : 0,
            'health_issue_file' => 'upload/injury_files/' . $injury_file_name,
            'training_service_type' => $request->training_service_type,
            'pm_of_interest' => $request->selected_course,
            'sponsorship_name' => $request->sponsorship_name,
            'declaration' => $declarationText,
            'trainee_type' => $traineeType,
            'signature' => $request->stu_signature,
            'created_at' => Carbon::now()
        ]);

        // Storing registered courses into tamkeen_registered_courses entity when (Training Service = Tutorial Course or Examination): 
        if (($request->training_service_type == 'Tutorial Course' || $request->training_service_type == 'Examination') && $request->nationality == 'Bahraini') {
            TamkeenRegisteredCourses::insert([
                'trainee_id' => $trainee_id,
                'course_id' => $request->selected_course,
                'created_at' => Carbon::now()
            ]);
        } else if ($request->training_service_type == 'Preparatory Course') {
            PreparatoryRegisteredCourses::insert([
                'trainee_id' => $trainee_id,
                'course_id' => $request->selected_course,
                'created_at' => Carbon::now()
            ]);
        } else if (($request->training_service_type == 'Tutorial Course' || $request->training_service_type == 'Examination') && $request->nationality != 'Bahraini') {
            NonBahrainiRegisteredCourse::insert([
                'trainee_id' => $trainee_id,
                'course_id' => $request->selected_course,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Your Data Submitted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    // Method: Display re-enrollment page for job seeker:  
    public function JobSeekerReEnrollment()
    {

        // Variable to get job seeker courses: 
        $job_seeker_courses = Course::where('is_job_seeker', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        // Variable to get Trainee Type: 
        $trainee_type = 'Job Seeker';

        return view('frontend.body.re_enrollment_trainee', compact('job_seeker_courses', 'trainee_type'));
    }

    // Method: Display re-enrollment page for employees: 
    public function EmployeeReEnrollment()
    {

        // Variable to get employee courses:
        $employee_courses = Course::where('is_employee', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        // Variable to get Trainee Type: 
        $trainee_type = 'Employee';

        return view('frontend.body.re_enrollment_trainee', compact('employee_courses', 'trainee_type'));
    }

    // Method: Display re-enrollment page for student page: 
    public function UniversityStuReEnrollment()
    {
        // Variable to get employee courses:
        $student_courses = Course::where('is_univ_student', 1)->orderBy('course_name', 'ASC')
            ->select('id', 'course_name')->get();

        // Variable to get Trainee Type: 
        $trainee_type = 'University Student';

        return view('frontend.body.re_enrollment_trainee', compact('student_courses', 'trainee_type'));
    }

    // Method: Store Re-Enrollment data of a Trainee: 
    public function StoreOldTraineeEnrollment(ReEnrollmentTraineeData $request)
    {

        // Trainee validation based on ReEnrollmentTraineeData class: 

        // Variable to get trainee id: 
        $current_trainee = Trainee::where('cpr', $request->trainee_cpr)->first();

        // dd($current_trainee->nationality);
        // dd($request->trainee_type);

        $declaration = "I confirm that the information that I have provided in this application is accurate, correct and complete and that the documents submitted along with this application form are genuine. I understand that withholding any information requested or giving false information may make me ineligible for enrollment, admission, or compel my expulsion from the institution. I, also, hereby acknowledge that I have read and understood the Enma Terms and Conditions and Enma Code of Conduct in its entirety and agree to abide by them. I understand and agree that this declaration is final and irrevocable, and that it is not subject to cancellation or amendments.";


        // Storing registered courses into tamkeen_registered_courses entity when (Training Service = Tutorial Course or Examination): 
        if (($request->training_service_type == 'Tutorial Course' || $request->training_service_type == 'Examination') && $current_trainee->nationality == 'Bahraini') {
            TamkeenRegisteredCourses::insert([
                'trainee_id' => $current_trainee->id,
                'course_id' => $request->selected_course,
                'trainee_type' => $request->trainee_type,
                'training_service' => $request->training_service_type,
                'program_sponsorship' => $request->sponsorship_name,
                'declaration' => $declaration,
                'created_at' => Carbon::now()
            ]);
        } else if ($request->training_service_type == 'Preparatory Course') {
            PreparatoryRegisteredCourses::insert([
                'trainee_id' => $current_trainee->id,
                'course_id' => $request->selected_course,
                'trainee_type' => $request->trainee_type,
                'training_service' => $request->training_service_type,
                'program_sponsorship' => $request->sponsorship_name,
                'declaration' => $declaration,
                'created_at' => Carbon::now()
            ]);
        } else if (($request->training_service_type == 'Tutorial Course' || $request->training_service_type == 'Examination') && $current_trainee->nationality != 'Bahraini') {
            NonBahrainiRegisteredCourse::insert([
                'trainee_id' => $current_trainee->id,
                'course_id' => $request->selected_course,
                'training_service' => $request->training_service_type,
                'program_sponsorship' => $request->sponsorship_name,
                'declaration' => $declaration,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Your Data Submitted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
