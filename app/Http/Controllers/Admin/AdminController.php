<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewTrainerValidation;
use App\Http\Requests\TrainerUpdateValidation;
use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
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
            'training_code' => $request->training_fields,
            'nationality' => $request->nationality,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
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
            'training_code' => $request->updated_training_fields,
            'nationality' => $request->updated_nationality,
            'issue_date' => $request->updated_issue_date,
            'expiry_date' => $request->updated_expiry_date,
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
        return view('backend.courses.add_course');
    }
}
