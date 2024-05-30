<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Method: Admin logout: 
    public function Logout(){
        Auth::guard('web')->logout();
        // Clearing User Session: 
        Session::flush();

        return redirect()->route('login');
    }
}
