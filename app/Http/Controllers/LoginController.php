<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function check(Request $request)
    {
        $postData = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($postData)) {
            $request->session()->regenerate();

            if (Auth::guard('admins')->user()->role == 'Admin') {
                return response([
                    'success' => true,
                    'redirect_url' => '/admin/datawarga/',
                    'pesan' => 'login berhasil'
                ]);
            } else if (Auth::guard('admins')->user()->role == 'Super Admin') {
                return response([
                    'success' => true,
                    'redirect_url' => '/superadmin',
                    'pesan' => 'login berhasil'
                ]);
            } else {
                return response([
                    'success' => false,
                    'pesan =>Anda tidak memiliki Akses'
                ], 401);
            }
        } else {
            return response(['success' => false], 401);
        }
    }
    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect()->to('/login', 302);
    }
}
