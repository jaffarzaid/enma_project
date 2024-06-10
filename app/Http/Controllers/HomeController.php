<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TraineeDataValidation;
use App\Models\Course;

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
    // Method: Display Registration Page: 
    public function DisplayRegistrationPage()
    {
        // Variable to get all courses: 
        $all_courses = Course::orderBy('course_name', 'ASC')
        ->select('id', 'course_name')->get();

        return view('frontend.body.registration', compact('all_courses'));
    }


    // Method: Store Student Data: 
    public function StoreStudentInfo(TraineeDataValidation $request)
    {
        // Hint: all data is validated into StudentDataValidation class

        return redirect()->route('display.registration');
    }
}
