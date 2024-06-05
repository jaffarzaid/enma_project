<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseUpdateValidation;
use App\Http\Requests\NewCourseValidation;
use App\Http\Requests\NewTrainerValidation;
use App\Http\Requests\TrainerUpdateValidation;
use App\Models\Course;
use App\Models\Trainee;
use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    public function StoreCourse(NewCourseValidation $request){
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
    public function DisplayAllCourses(){

        // Variable to get Courses: 
        $courses = Course::orderBy('id', 'DESC')->paginate();

        return view('backend.courses.all_courses', compact('courses'));
    }

    // Method: Display Edit Course Page: 
    public function EditCourse($id){

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
    public function UpdateCourse(CourseUpdateValidation $request, $id){

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
    public function ViewCourse($id){
        // Variable to get specific course: 
        $current_course = DB::table('trainers')
        ->join('courses', 'trainers.id', '=', 'courses.trainer_id')
        ->where('courses.id', $id)
        ->select('courses.*', 'trainers.name as trainer_name') 
        ->first();

        return view('backend.courses.view_course', compact('current_course'));
    }
}
