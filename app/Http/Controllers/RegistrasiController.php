<?php

namespace App\Http\Controllers;

use App\Models\akunWarga;
use App\Models\dataWarga;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('warga.registrasi');
    }

    public function daftar(Request $request)
    {
        $data = [
            'nik' => $request->nik
            ];
        return view('warga.daftar',$data);
    }
    public function simpan(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $checkUsername =  dataWarga::where('nik', '=', $request->username)->exists();

        if ($checkUsername) {
            $insert = akunWarga::create($data);
            if ($insert) {
                return response([
                    'success' => true,
                    'pesan' => 'aktivasi berhasil'
                ]);
            } else {
                return response([
                    'success' => true,
                    'pesan' => 'Aktivasi Gagal'
                ]);
            }
        }else{
            return redirect()->route('registrasi.daftar');
        }
    }

    public function checkUsername(Request $request)
    {
        $data = $request->validate([
            'nik' => ['required'],
        ]);

        $nikExists = dataWarga::where('nik', '=', $request->nik)->exists();
        if ($nikExists) {
            return response([
                'success' => true,
                'pesan' => 'username ditemukan',
                'nik' => $request->nik
            ]);
        } else {
            return response([
                'success' => false,
                'pesan' => 'username tidak ditemukan'
            ], 401);
        }
    }
}
