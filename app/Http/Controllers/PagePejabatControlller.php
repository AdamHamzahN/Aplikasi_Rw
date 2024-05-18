<?php

namespace App\Http\Controllers;

use App\Models\dataWarga;
use App\Models\Pejabat;
use Illuminate\Http\Request;

class PagePejabatControlller extends Controller
{
    public function index(){
        $data = [
            'pejabats' => Pejabat::all(),
            'datawargas' => dataWarga::all()
        ];
        return view('warga.pejabat',$data);
    }
}
