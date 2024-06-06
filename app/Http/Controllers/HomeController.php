<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TraineeDataValidation;


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
        return view('frontend.body.registration');
    }


    // Method: Store Student Data: 
    public function StoreStudentInfo(TraineeDataValidation $request)
    {
        // Hint: all data is validated into StudentDataValidation class

        return redirect()->route('display.registration');
    }
}
