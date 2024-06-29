<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildAdminValidation;
use App\Http\Requests\CourseUpdateValidation;
use App\Http\Requests\NewCourseValidation;
use App\Http\Requests\NewTrainerValidation;
use App\Http\Requests\TrainerUpdateValidation;
use App\Http\Requests\UpdateChildAdminValidation;
use App\Http\Requests\UpdateTraineeValidation;
use App\Models\Course;
use App\Models\NonBahrainiRegisteredCourse;
use App\Models\PreparatoryRegisteredCourses;
use App\Models\TamkeenRegisteredCourses;
use App\Models\Trainee;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // function to ensure a user is authenticated before executing any function: 
    public function __construct()
    {
        $this->middleware('auth');
    }


    //Method: Admin logout: 
    public function Logout()
    {
        Auth::guard('web')->logout();
        // Clearing User Session: 
        Session::invalidate();
        // Regenerate CSRF: 
        Session::regenerateToken();

        return redirect()->route('login');
    }

    // Method: Display Add Tutor Page: 
    public function AddTrainer()
    {
        return view('backend.trainers.add_trainer');
    }

    // Method: Store Trainer Data: 
    public function StoreTrainer(NewTrainerValidation $request)
    {

        // All Trainer data is validated at BackendValidation Class.

        // Storing Trainer's Data into database: 
        Trainer::insert([
            'cpr' => $request->trainer_cpr,
            'name' => $request->trainer_name,
            'license_code' => $request->license_code,
            'employment_status' => $request->employment_status,
            'training_field' => $request->training_fields,
            'nationality' => $request->nationality,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            'entered_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Trainer data inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    // Method: display all trainers page: 
    public function DisplayAllTrainer()
    {
        // Variable to get all added trainers: 
        $trainers = Trainer::orderBy('id', 'DESC')->paginate(10);

        return view('backend.trainers.all_trainers', compact('trainers'));
    }

    // Method: View All Trainer: 
    public function ViewTrainer($id)
    {

        // Variable To get specific trainer details: 
        $current_trainer = Trainer::where('id', $id)->first();

        return view('backend.trainers.view_trainer_details', compact('current_trainer'));
    }

    //  Method: Display trainer edit page: 
    public function EditTrainer($id)
    {
        // Get requested trainer: 
        $current_trainer = Trainer::where('id', $id)->first();

        return view('backend.trainers.edit_trainer', compact('current_trainer'));
    }

    // Method: update trainer data: 
    public function UpdateTrainer(TrainerUpdateValidation $request, $id)
    {
        // Validation is through BackendValidation class: 
        // Updating current trainer: 
        Trainer::where('id', $id)->update([
            'cpr' => $request->updated_trainer_cpr,
            'name' => $request->updated_trainer_name,
            'license_code' => $request->updated_license_code,
            'employment_status' => $request->updated_employment_status,
            'training_field' => $request->updated_training_fields,
            'nationality' => $request->updated_nationality,
            'issue_date' => $request->updated_issue_date,
            'expiry_date' => $request->updated_expiry_date,
            'edited_by' => Auth::user()->name,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Trainer Data Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.trainers')->with($notification);
    }


    // Method: Display Add Courses Page: 
    public function AddCourses()
    {
        // Variable to get all trainers: 
        $trainers = Trainer::orderBy('name', 'ASC')->get();
        return view('backend.courses.add_course', compact('trainers'));
    }

    // Method: Store Courses: 
    public function StoreCourse(NewCourseValidation $request)
    {
        // All validation based on NewCourseValidation class: 

        // Adding a course to database: 
        Course::insert([
            'trainer_id' => $request->trainer_name,
            'awarding_body' => $request->awarding_body,
            'course_code' => $request->course_code,
            'course_name' => $request->course_name,
            'license_code' => $request->license_code,
            'num_of_hours' => $request->num_of_hours,
            'mol_level' => $request->mol_approval,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            'is_job_seeker' => isset($request->job_seeker) ? 1 : 0,
            'is_employee' => isset($request->employee) ? 1 : 0,
            'is_univ_student' => isset($request->univ_student) ? 1 : 0,
            'is_expat' => isset($request->expat) ? 1 : 0,
            'entered_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Course Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    // Method: Display All Courses: 
    public function DisplayAllCourses()
    {

        // Variable to get Courses: 
        $courses = Course::orderBy('id', 'DESC')->paginate(10);

        return view('backend.courses.all_courses', compact('courses'));
    }

    // Method: Display Edit Course Page: 
    public function EditCourse($id)
    {

        // Variable to get specific course: 
        $current_course = DB::table('trainers')
            ->join('courses', 'trainers.id', '=', 'courses.trainer_id')
            ->where('courses.id', $id)
            ->select('courses.*', 'trainers.name as trainer_name')
            ->first();

        // Variable to get trainers" 
        $trainers = Trainer::orderBy('name', 'ASC')->get();

        return view('backend.courses.edit_course', compact('current_course', 'trainers'));
    }


    // Method: Update Course data: 
    public function UpdateCourse(CourseUpdateValidation $request, $id)
    {

        // Validation of course data is available into CourseUpdateValidation class: 

        // updating data into database: 
        Course::where('id', $id)->update([
            'trainer_id' => $request->trainer_name,
            'awarding_body' => $request->awarding_body,
            'course_code' => $request->course_code,
            'course_name' => $request->course_name,
            'license_code' => $request->license_code,
            'num_of_hours' => $request->num_of_hours,
            'mol_level' => $request->mol_approval,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            'is_job_seeker' => isset($request->job_seeker) ? 1 : 0,
            'is_employee' => isset($request->employee) ? 1 : 0,
            'is_univ_student' => isset($request->univ_student) ? 1 : 0,
            'is_expat' => isset($request->expat) ? 1 : 0,
            'edited_by' => Auth::user()->name,
            'updated_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Course Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('view.courses')->with($notification);
    }

    // Method: View Course data Page:
    public function ViewCourse($id)
    {
        // Variable to get specific course: 
        $current_course = DB::table('trainers')
            ->join('courses', 'trainers.id', '=', 'courses.trainer_id')
            ->where('courses.id', $id)
            ->select('courses.*', 'trainers.name as trainer_name')
            ->first();

        return view('backend.courses.view_course', compact('current_course'));
    }

    // Method: Display page to create child admin: 
    public function CreateChildAdmin()
    {
        return view('backend.child_admins.create_child_admin');
    }

    // Method: Store child Admin into User Model: 
    public function StoreChildAdmin(ChildAdminValidation $request)
    {
        // all Child Admin is validated into ChildAdminValidation class: 

        // Inserting child admin in User Model: 
        User::insert([
            'name' => $request->emp_name,
            'email' => $request->emp_email,
            'password' => Hash::make($request->password),
            'list_of_trainees' => isset($request->list_of_trainees) ? 1 : 0,
            'courses' => isset($request->courses) ? 1 : 0,
            'list_of_trainers' => isset($request->list_of_trainers) ? 1 : 0,
            'examination' => isset($request->examination) ? 1 : 0,
            // 'child_admin' => isset($request->child_admin) ? 1 : 0,
            'is_viewer' => isset($request->viewer_account) ? 1 : 0,
            'learning_support' => isset($request->learning_support) ? 1 : 0,
            'reading_materials' => isset($request->reading_materials) ? 1 : 0,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Child Admin created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    // Method: Display All Child Admin: 
    public function ViewChildAdmins()
    {

        // variable to get all child Admin: 
        $child_admins = User::orderBy('id', 'DESC')->select('id', 'name', 'email', 'status')
            ->where('is_child_admin', 1)->paginate(10);

        return view('backend.child_admins.all_child_admins', compact('child_admins'));
    }

    // Method: Display Edit Child Admin Page: 
    public function EditChildAdmin($id)
    {

        // Variable to get specific child admin:
        $curr_child_admin = User::where('id', $id)->first();

        return view('backend.child_admins.edit_child_admin', compact('curr_child_admin'));
    }

    // Method: Update Child Admin Data: 
    public function UpdateChildAdmin(UpdateChildAdminValidation $request, $id)
    {
        // Validation in on class: 

        // Storing Updated data into array:
        $updated_data = [
            'name' => $request->emp_name,
            'email' => $request->emp_email,
            'list_of_trainees' => isset($request->list_of_trainees) ? 1 : 0,
            'courses' => isset($request->courses) ? 1 : 0,
            'list_of_trainers' => isset($request->list_of_trainers) ? 1 : 0,
            'examination' => isset($request->examination) ? 1 : 0,
            // 'child_admin' => isset($request->viewer_account) ? 1 : 0,
            'is_viewer' => isset($request->viewer_account) ? 1 : 0,
            'learning_support' => isset($request->learning_support) ? 1 : 0,
            'reading_materials' => isset($request->reading_materials) ? 1 : 0,
            'updated_at' => Carbon::now()
        ];

        // Condition to check if a user want to change his password: 
        if ($request->filled('password')) {
            $updated_data['password'] = Hash::make($request->password);
        }

        // Updating Child Admin: 
        User::where('id', $id)->update($updated_data);

        $notification = array(
            'message' => 'Child Admin Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.child_admins')->with($notification);
    }

    // Method: Deactivate Child Admin: 
    public function DeactivateChildAdmin($id)
    {
        // Change Child Admin Status: 
        User::where('id', $id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Account Deactivated Successfully',
            'alert-type' => 'warning',
        );

        return redirect()->back()->with($notification);
    }

    // Method: Activate Child Admin: 
    public function ActivateChildAdmin($id)
    {
        // Change Child Admin Status to active: 
        User::where('id', $id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Child Admin Activated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    // Method: Display All Trainees Page: 
    public function ViewAllTrainees()
    {
        // Variable to get all trainees from database: 
        $all_trainees = Trainee::orderBy('created_at', 'DESC')->paginate(10);

        // Variable to join trainees entity with tamkeen_registered_courses entity to get extra data: 
        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', 'trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'tamkeen_registered_courses.program_sponsorship', 'tamkeen_registered_courses.trainee_type', 'tamkeen_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with preparatory_registered_courses entity to get extra data: 
        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', 'trainees.id', '=', 'preparatory_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'preparatory_registered_courses.program_sponsorship', 'preparatory_registered_courses.trainee_type')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with non_bahraini_registered_courses entity to get extra data: 
        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', 'trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.trainee_type', 'non_bahraini_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');

        return view('backend.trainees.all_trainees', compact('all_trainees', 'trainee_tm', 'trainee_pre', 'trainee_non_bh'));
    }

    // Method: Display only Employee Trainees: 
    public function ViewEmployeeTrainees()
    {
        // Variable to get only Employee Trainee: 
        $emp_trainees = Trainee::where('trainee_type', 'Employee')->paginate(10);

        // Variable to join trainees entity with tamkeen_registered_courses entity to get extra data: 
        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', 'trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'tamkeen_registered_courses.program_sponsorship', 'tamkeen_registered_courses.trainee_type', 'tamkeen_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with preparatory_registered_courses entity to get extra data: 
        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', 'trainees.id', '=', 'preparatory_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'preparatory_registered_courses.program_sponsorship', 'preparatory_registered_courses.trainee_type')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with non_bahraini_registered_courses entity to get extra data: 
        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', 'trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.trainee_type', 'non_bahraini_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');


        return view('backend.trainees.view_employee_trainees', compact('emp_trainees', 'trainee_tm', 'trainee_pre', 'trainee_non_bh'));
    }

    // Method Display only Job Seeker Trainees: 
    public function ViewJobSeekerTrainees()
    {
        // Variable to get only job seeker trainees: 
        $job_seeker_trainees = Trainee::where('trainee_type', 'Job Seeker')->paginate(10);

        // Variable to join trainees entity with tamkeen_registered_courses entity to get extra data: 
        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', 'trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'tamkeen_registered_courses.program_sponsorship', 'tamkeen_registered_courses.trainee_type', 'tamkeen_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with preparatory_registered_courses entity to get extra data: 
        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', 'trainees.id', '=', 'preparatory_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'preparatory_registered_courses.program_sponsorship', 'preparatory_registered_courses.trainee_type')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with non_bahraini_registered_courses entity to get extra data: 
        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', 'trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.trainee_type', 'non_bahraini_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');


        return view('backend.trainees.view_job_seeker_trainees', compact('job_seeker_trainees', 'trainee_tm', 'trainee_pre', 'trainee_non_bh'));
    }

    // Method: Display only University Student: 
    public function ViewUnivStudentTrainees()
    {
        // Variable to get only University Student Trainees: 
        $univ_student_trainees = Trainee::where('trainee_type', 'University Student')->paginate(10);

        // Variable to join trainees entity with tamkeen_registered_courses entity to get extra data: 
        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', 'trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'tamkeen_registered_courses.program_sponsorship', 'tamkeen_registered_courses.trainee_type', 'tamkeen_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with preparatory_registered_courses entity to get extra data: 
        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', 'trainees.id', '=', 'preparatory_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'preparatory_registered_courses.program_sponsorship', 'preparatory_registered_courses.trainee_type')
            ->get()->keyBy('trainee_id');

        // Variable to join trainees entity with non_bahraini_registered_courses entity to get extra data: 
        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', 'trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.trainee_type', 'non_bahraini_registered_courses.approval_status')
            ->get()->keyBy('trainee_id');

        return view('backend.trainees.view_univ_student_trainees', compact('univ_student_trainees', 'trainee_tm', 'trainee_pre', 'trainee_non_bh'));
    }

    // Method: Display Edit Trainee Page: 
    public function EditTraineeInfo($id)
    {
        // Variable to get requested trainee: 
        $current_trainee = Trainee::where('id', $id)->first();

        // Variable to join trainees entity with tamkeen_registered_courses entity to get extra data: 
        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', 'trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'tamkeen_registered_courses.*')
            ->where('trainees.id', $id)
            ->orderByDesc('tamkeen_registered_courses.created_at')
            ->first();

        // Variable to join trainees entity with preparatory_registered_courses entity to get extra data: 
        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', 'trainees.id', '=', 'preparatory_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'preparatory_registered_courses.*')
            ->where('trainees.id', $id)
            ->orderBy('preparatory_registered_courses.created_at', 'DESC')
            ->first();

        // Variable to join trainees entity with non_bahraini_registered_courses entity to get extra data: 
        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', 'trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.trainee_type')
            ->where('trainees.id', $id)
            ->orderBy('non_bahraini_registered_courses.created_at', 'DESC')
            ->first();

        // Variable to get Courses: 
        $courses = Course::orderBy('course_name', 'ASC')->get();

        return view('backend.trainees.edit_trainee', compact('current_trainee', 'trainee_tm', 'trainee_pre', 'trainee_non_bh', 'courses'));
    }

    // Method: Update Trainee Data: 
    public function UpdateTraineeData(UpdateTraineeValidation $request, $id)
    {
        // All validation of updating trainee data is on UpdateTraineeValidation: 

        // Updating Trainee data: 
        Trainee::where('id', $id)->update([
            'f_name' => $request->trainee_f_name,
            's_name' => $request->trainee_s_name,
            'l_name' => $request->trainee_l_name,
            'gender' => $request->trainee_gender,
            'cpr' => $request->trainee_cpr,
            'nationality' => $request->nationality,
            'phone1' => $request->phone_1,
            'phone2' => $request->phone_2,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'email' => $request->email,
            'emergency_name' => $request->emergency_name,
            'emergency_relationship' => $request->emergency_relationship,
            'emergency_phone' => $request->emergency_phone,
            'qualification' => $request->trainee_qualification,
            'specialization' => $request->trainee_specialization,
            'gpa' => $request->gpa,
            'instruction_language' => $request->instruction_lang,
            'study_status_specification' => $request->study_status_specification,
            'pro_certificate_name' => $request->pro_certificate_name,
            'pro_certificate_specialization' => $request->pro_certificate_specialization,
            'pro_awarding_body' => $request->pro_awarding_body,
            'pro_year' => $request->filled('pro_year') ? (int) $request->pro_year : null,
            'job_title' => $request->job_title,
            'job_nature' => $request->job_nature,
            'employer' => $request->employer,
            'num_of_experience' => $request->filled('num_of_experience') ? (int) $request->num_of_experience : null,
            'updated_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Trainee data Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('view.all.trainees')->with($notification);
    }

    // Method: Display Approve Trainee Page: 
    public function DisplayApprovePage($id)
    {
        // Variable to get Requested Trainee: 
        $current_trainee = Trainee::where('id', $id)->first();

        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', function ($join) {
                $join->on('trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
                    ->orderBy('tamkeen_registered_courses.created_at', 'DESC');
            })
            ->select('trainees.id as trainee_id', 'tamkeen_registered_courses.course_id', 'tamkeen_registered_courses.training_service', 'tamkeen_registered_courses.program_sponsorship', 'tamkeen_registered_courses.reason_of_rejection', 'tamkeen_registered_courses.note', 'tamkeen_registered_courses.created_at')
            ->where('trainees.id', $id)
            ->get();

        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', function ($join) {
                $join->on('trainees.id', '=', 'preparatory_registered_courses.trainee_id')
                    ->orderBy('preparatory_registered_courses.created_at', 'DESC');
            })
            ->select('trainees.id as trainee_id', 'preparatory_registered_courses.course_id', 'preparatory_registered_courses.training_service', 'preparatory_registered_courses.program_sponsorship', 'preparatory_registered_courses.reason_of_rejection', 'preparatory_registered_courses.note', 'preparatory_registered_courses.created_at')
            ->where('trainees.id', $id)
            ->get();

        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', function ($join) {
                $join->on('trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
                    ->orderBy('non_bahraini_registered_courses.created_at', 'DESC');
            })
            ->select('trainees.id as trainee_id', 'non_bahraini_registered_courses.course_id', 'non_bahraini_registered_courses.training_service', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.reason_of_rejection', 'non_bahraini_registered_courses.note', 'non_bahraini_registered_courses.created_at')
            ->where('trainees.id', $id)
            ->get();

        // Variable to get Courses:
        $courses = Course::orderBy('course_name', 'ASC')->get();

        // Variable to check latest selected course:
        $latestCourse = null;

        // Variable to get latest program sponsorship by a trainee:
        $sponsorship = '';

        if ($trainee_tm->isNotEmpty()) {
            $latestCourse = $trainee_tm->sortByDesc('created_at')->first();
            $sponsorship = $latestCourse->program_sponsorship;
        }

        if ($trainee_pre->isNotEmpty() && $trainee_pre->sortByDesc('created_at')->first()->created_at > ($latestCourse ? $latestCourse->created_at : null)) {
            $latestCourse = $trainee_pre->sortByDesc('created_at')->first();
            $sponsorship = $latestCourse->program_sponsorship;
        }

        if ($trainee_non_bh->isNotEmpty() && $trainee_non_bh->sortByDesc('created_at')->first()->created_at > ($latestCourse ? $latestCourse->created_at : null)) {
            $latestCourse = $trainee_non_bh->sortByDesc('created_at')->first();
            $sponsorship = $latestCourse->program_sponsorship;
        }

        $selectedCourse = '';

        if ($latestCourse && $latestCourse->course_id) {
            $selectedCourse = $courses->firstWhere('id', $latestCourse->course_id)->course_name;
        }

        // Variable to get latest program sponsorship by a trainer: 
        $sponsorship = '';
        if ($latestCourse && $latestCourse->program_sponsorship) {
            $sponsorship = $latestCourse->program_sponsorship;
        }

        // dd($selectedCourse);

        return view('backend.trainees.approve_trainee_page', compact('current_trainee', 'trainee_tm', 'trainee_pre', 'trainee_non_bh', 'selectedCourse', 'sponsorship', 'latestCourse'));
    }

    // Method: Accept Trainee: 
    public function UpdateApproveStatus(Request $request, $id)
    {
        // Updating trainee approve status: 
        if (TamkeenRegisteredCourses::where('trainee_id', $id)->exists()) {
            $latestRecord = TamkeenRegisteredCourses::where('trainee_id', $id)
                ->orderBy('created_at', 'desc')->first();

            if ($latestRecord) {
                $latestRecord->update([
                    'approval_status' => 'Accepted',
                    'note' => $request->note,
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        if (PreparatoryRegisteredCourses::where('trainee_id', $id)->exists()) {
            $latestRecord = PreparatoryRegisteredCourses::where('trainee_id', $id)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($latestRecord) {
                $latestRecord->update([
                    'approval_status' => 'Accepted',
                    'note' => $request->note,
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        if (NonBahrainiRegisteredCourse::where('trainee_id', $id)->exists()) {
            $latestRecord = NonBahrainiRegisteredCourse::where('trainee_id', $id)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($latestRecord) {
                $latestRecord->update([
                    'approval_status' => 'Accepted',
                    'note' => $request->note,
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        $notification = array(
            'message' => 'Trainee Accepted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('pending.trainees')->with($notification);
    }

    // Method: Reject Trainee 
    public function RejectTrainee(Request $request, $id)
    {
        // Updating trainee approve status: 
        if (TamkeenRegisteredCourses::where('trainee_id', $id)->exists()) {
            $latestRecord = TamkeenRegisteredCourses::where('trainee_id', $id)
                ->orderBy('created_at', 'desc')->first();

            if ($latestRecord) {
                $latestRecord->update([
                    'approval_status' => 'Rejected',
                    'reason_of_rejection' => $request->rejection_reason,
                    'note' => $request->note,
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        if (PreparatoryRegisteredCourses::where('trainee_id', $id)->exists()) {
            $latestRecord = PreparatoryRegisteredCourses::where('trainee_id', $id)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($latestRecord) {
                $latestRecord->update([
                    'approval_status' => 'Rejected',
                    'reason_of_rejection' => $request->rejection_reason,
                    'note' => $request->note,
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        if (NonBahrainiRegisteredCourse::where('trainee_id', $id)->exists()) {
            $latestRecord = NonBahrainiRegisteredCourse::where('trainee_id', $id)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($latestRecord) {
                $latestRecord->update([
                    'approval_status' => 'Rejected',
                    'reason_of_rejection' => $request->rejection_reason,
                    'note' => $request->note,
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        $notification = array(
            'message' => 'Trainee Rejected Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('pending.trainees')->with($notification);
    }

    // Method: Read only full details of a trainee acceptance/rejection: 
    public function ReadTraineeDetails($id)
    {
        // Variable to get Requested Trainee: 
        $current_trainee = Trainee::where('id', $id)->first();

        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', function ($join) {
                $join->on('trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
                    ->orderBy('tamkeen_registered_courses.created_at', 'DESC');
            })
            ->select('trainees.id as trainee_id', 'tamkeen_registered_courses.course_id', 'tamkeen_registered_courses.training_service', 'tamkeen_registered_courses.program_sponsorship', 'tamkeen_registered_courses.reason_of_rejection', 'tamkeen_registered_courses.note', 'tamkeen_registered_courses.created_at')
            ->where('trainees.id', $id)
            ->get();

        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', function ($join) {
                $join->on('trainees.id', '=', 'preparatory_registered_courses.trainee_id')
                    ->orderBy('preparatory_registered_courses.created_at', 'DESC');
            })
            ->select('trainees.id as trainee_id', 'preparatory_registered_courses.course_id', 'preparatory_registered_courses.training_service', 'preparatory_registered_courses.program_sponsorship', 'preparatory_registered_courses.reason_of_rejection', 'preparatory_registered_courses.note', 'preparatory_registered_courses.created_at')
            ->where('trainees.id', $id)
            ->get();

        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', function ($join) {
                $join->on('trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
                    ->orderBy('non_bahraini_registered_courses.created_at', 'DESC');
            })
            ->select('trainees.id as trainee_id', 'non_bahraini_registered_courses.course_id', 'non_bahraini_registered_courses.training_service', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.reason_of_rejection', 'non_bahraini_registered_courses.note', 'non_bahraini_registered_courses.created_at')
            ->where('trainees.id', $id)
            ->get();

        // Variable to get Courses:
        $courses = Course::orderBy('course_name', 'ASC')->get();

        // Variable to check latest selected course:
        $latestCourse = null;

        // Variable to get latest program sponsorship by a trainee:
        $sponsorship = '';

        if ($trainee_tm->isNotEmpty()) {
            $latestCourse = $trainee_tm->sortByDesc('created_at')->first();
            $sponsorship = $latestCourse->program_sponsorship;
        }

        if ($trainee_pre->isNotEmpty() && $trainee_pre->sortByDesc('created_at')->first()->created_at > ($latestCourse ? $latestCourse->created_at : null)) {
            $latestCourse = $trainee_pre->sortByDesc('created_at')->first();
            $sponsorship = $latestCourse->program_sponsorship;
        }

        if ($trainee_non_bh->isNotEmpty() && $trainee_non_bh->sortByDesc('created_at')->first()->created_at > ($latestCourse ? $latestCourse->created_at : null)) {
            $latestCourse = $trainee_non_bh->sortByDesc('created_at')->first();
            $sponsorship = $latestCourse->program_sponsorship;
        }

        $selectedCourse = '';

        if ($latestCourse && $latestCourse->course_id) {
            $selectedCourse = $courses->firstWhere('id', $latestCourse->course_id)->course_name;
        }

        // Variable to get latest program sponsorship by a trainer: 
        $sponsorship = '';
        if ($latestCourse && $latestCourse->program_sponsorship) {
            $sponsorship = $latestCourse->program_sponsorship;
        }

        $trainee_tm_note = $trainee_tm->isNotEmpty() ? $trainee_tm->first()->note : '';

        $trainee_pre_note = $trainee_pre->isNotEmpty() ? $trainee_pre->first()->note : '';

        $trainee_non_bh_note = $trainee_non_bh->isNotEmpty() ? $trainee_non_bh->first()->note : '';

        return view(
            'backend.trainees.read_trainee_details',
            compact(
                'current_trainee',
                'trainee_tm',
                'trainee_pre',
                'trainee_non_bh',
                'courses',
                'selectedCourse',
                'sponsorship',
                'trainee_non_bh_note',
                'trainee_tm_note',
                'trainee_pre_note',
                'latestCourse'
            )
        );
    }

    // Method: View Pending Trainees Page: 
    public function ViewPendingTrainees()
    {
        // Getting pending trainees and related data
        $trainee_tm = DB::table('trainees')
            ->join('tamkeen_registered_courses', 'trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'trainees.f_name', 'trainees.s_name', 'trainees.l_name', 'trainees.cpr', 'trainees.nationality', 'trainees.phone1', 'trainees.phone2', 'trainees.qualification', 'trainees.specialization', 'tamkeen_registered_courses.program_sponsorship', 'tamkeen_registered_courses.trainee_type')
            ->where('tamkeen_registered_courses.approval_status', 'Pending')
            ->get()->keyBy('trainee_id');

        $trainee_pre = DB::table('trainees')
            ->join('preparatory_registered_courses', 'trainees.id', '=', 'preparatory_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'trainees.f_name', 'trainees.s_name', 'trainees.l_name', 'trainees.cpr', 'trainees.nationality', 'trainees.phone1', 'trainees.phone2', 'trainees.qualification', 'trainees.specialization', 'preparatory_registered_courses.program_sponsorship', 'preparatory_registered_courses.trainee_type')
            ->where('preparatory_registered_courses.approval_status', 'Pending')
            ->get()->keyBy('trainee_id');

        $trainee_non_bh = DB::table('trainees')
            ->join('non_bahraini_registered_courses', 'trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
            ->select('trainees.id as trainee_id', 'trainees.f_name', 'trainees.s_name', 'trainees.l_name', 'trainees.cpr', 'trainees.nationality', 'trainees.phone1', 'trainees.phone2', 'trainees.qualification', 'trainees.specialization', 'non_bahraini_registered_courses.program_sponsorship', 'non_bahraini_registered_courses.trainee_type')
            ->where('non_bahraini_registered_courses.approval_status', 'Pending')
            ->get()->keyBy('trainee_id');

        // Merge all pending trainees into one collection (if needed)
        $pending_trainees = $trainee_tm->merge($trainee_pre)->merge($trainee_non_bh);

        // Pass the pending_trainees collection to your view
        return view('backend.trainees.pending_trainees', compact('pending_trainees'));
    }

    // Method: Display Full Trainee History: 
    public function ViewTraineeHistory($id)
    {
        // Variable to get requested trainee: 
        $current_trainee = Trainee::where('id', $id)->first();

        // Joining trainees, tamkeen_registered_courses, preparatory_registered_courses and non_bahraini_registered_courses entities: 
        $all_trainingEntities = DB::table('trainees')
        ->leftJoin('tamkeen_registered_courses', 'trainees.id', '=', 'tamkeen_registered_courses.trainee_id')
        ->leftJoin('preparatory_registered_courses', function ($join) {
            $join->on('trainees.id', '=', 'preparatory_registered_courses.trainee_id')
                ->join('courses as preparatory_courses', 'preparatory_registered_courses.course_id', '=', 'preparatory_courses.id');
        })
        ->leftJoin('non_bahraini_registered_courses', function ($join) {
            $join->on('trainees.id', '=', 'non_bahraini_registered_courses.trainee_id')
                ->join('courses as non_bahraini_courses', 'non_bahraini_registered_courses.course_id', '=', 'non_bahraini_courses.id');
        })
        ->leftJoin('courses as tamkeen_courses', 'tamkeen_registered_courses.course_id', '=', 'tamkeen_courses.id')
        ->select(
            'trainees.id',
            'tamkeen_registered_courses.approval_status as tamkeen_approval_status',
            'tamkeen_registered_courses.program_sponsorship as tamkeen_program_sponsorship',
            'tamkeen_registered_courses.training_service as tamkeen_training_service',
            'tamkeen_registered_courses.trainee_type as tamkeen_trainee_type',
            'tamkeen_registered_courses.created_at as tamkeen_creation',
            'preparatory_registered_courses.approval_status as preparatory_approval_status',
            'preparatory_registered_courses.program_sponsorship as preparatory_program_sponsorship',
            'preparatory_registered_courses.training_service as preparatory_training_service',
            'preparatory_registered_courses.trainee_type as preparatory_trainee_type',
            'preparatory_registered_courses.created_at as preparatory_creation',
            'non_bahraini_registered_courses.approval_status as non_bahraini_approval_status',
            'non_bahraini_registered_courses.program_sponsorship as non_bahraini_program_sponsorship',
            'non_bahraini_registered_courses.training_service as non_bahraini_training_service',
            'non_bahraini_registered_courses.trainee_type as non_bahraini_trainee_type',
            'non_bahraini_registered_courses.created_at as non_bahraini_creation',
            'tamkeen_courses.course_name as tamkeen_course_name',
            'preparatory_courses.course_name as preparatory_course_name',
            'non_bahraini_courses.course_name as non_bahraini_course_name'
        )
        ->where('trainees.id', $id)
        ->get();



        return view('backend.trainees.trainee_history', compact('current_trainee', 'all_trainingEntities'));

    }
}
