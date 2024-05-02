<?php

namespace App\Http\Controllers;

use App\Models\dataWarga;
use App\Models\jabatan;
use App\Models\pengurusRw;
use Illuminate\Http\Request;

class PengurusRwController extends Controller
{
    //
    public function index()
    {
        $data = [
            'pejabats' => pengurusRw::all(),
            'jabatans' => jabatan::all(),
            'datawargas' => dataWarga::all()
        ];

        return view('admin.pengurusrw.index', $data);
    }

    public function tambah()
    {
        $data = [
            'datawargas' => dataWarga::all(),
            'jabatans' => jabatan::all(),
            'pejabats' => pengurusRw::all()
        ];

        return view('admin.pengurusrw.tambah', $data);
    }

    public function simpan(Request $request)
    {

        $data = $request->validate([
            'nik' => ['required'],
            'id_jabatan' => ['required'],
        ]);

        //periksa apakah nik sudah ada?
        $nikExists = pengurusRw::where('nik', '=', $request->nik)->exists();

        //jika ada maka update
        if ($nikExists) :
            $update = pengurusRw::where('nik', '=', $request->nik)->update($data);
            if ($update) {
                return redirect()->route('pengurusrw.index');
            } else {
                return redirect()->route('pengurusrw.tambah');
            }
        //jika tidak tambahkan
        else :
            $insert = pengurusRw::create($data);
            if ($insert) {
                return redirect()->route('pengurusrw.index');
            } else {
                return redirect()->route('pengurusrw.tambah');
            }
        endif;
    }

    
}
