<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function formlogin(){
        return view('login.formlogin');
        }
}
