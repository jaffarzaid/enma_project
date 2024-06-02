<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendValidation;
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
        Session::flush();

        return redirect()->route('login');
    }

    // Method: Display Add Tutor Page: 
    public function AddTrainer()
    {
        return view('backend.trainers.add_trainer');
    }

    // Method: Store Trainer Data: 
    public function StoreTrainer(BackendValidation $request)
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


    // Method: Display Add Courses Page: 
    public function AddCourses()
    {
        return view('backend.courses.add_course');
    }
}
