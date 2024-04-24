<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.login.formlogin');
    }

    function check(Request $request)
    {
        $data = $request->validate([
            'admin' => ['required'],
            'password' => ['required']
        ]);

        $check = Admin::where('admin','=',$request->admin )
                        ->where('password','=',$request->password)
                        ->exists();
        if($check){
            return redirect()->route('datawarga.index');
        }else{
            return redirect()->route('login.index');
        }
    }
}
