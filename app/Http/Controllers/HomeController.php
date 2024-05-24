<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method: Display Registration Page: 
    public function DisplayRegistrationPage(){
        return view('frontend.body.registration');
    }
}
