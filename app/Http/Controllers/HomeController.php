<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentDataValidation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method: Display Registration Page: 
    public function DisplayRegistrationPage()
    {
        return view('frontend.body.registration');
    }


    // Method: Store Student Data: 
    public function StoreStudentInfo(StudentDataValidation $request)
    {
        // Hint: all data is validated into StudentDataValidation class

        return redirect()->route('display.registration');
    }
}
