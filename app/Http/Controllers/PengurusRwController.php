<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\pengurusRw;
use Illuminate\Http\Request;

class PengurusRwController extends Controller
{
    //
    public function index(){
        $data =[
            'pejabats' => pengurusRw::all(),
            'jabatans'=> jabatan::all()
        ];

             return view('admin.pengurusrw.index',$data);
    }

    public function formTambah()
    {
        return view('admin.pengurusrw.tambah');
    }

    public function simpan(){}
}
