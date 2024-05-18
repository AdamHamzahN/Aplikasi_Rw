<?php

namespace App\Http\Controllers;

use App\Models\dataWarga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request){
        $data = [
            'data_warga'=>dataWarga::where('nik', $request->nik)->first()
        ];
        return view('warga.home',$data);
    }
}
