<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginWargaController extends Controller
{
    public function index()
    {
        return view('warga.loginwarga');
    }

    public function check(Request $request)
    {
        $postData = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('wargas')->attempt($postData)) {
            $request->session()->regenerate();
            return response([
                'success' => true,
                'pesan' => 'login berhasil',
                'username' => $request->username,
            ]);
        } else {
            return response(['success' => false], 401);
        }
    }
}
