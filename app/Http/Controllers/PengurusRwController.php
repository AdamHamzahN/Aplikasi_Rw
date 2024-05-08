<?php

namespace App\Http\Controllers;

use App\Models\dataWarga;
use App\Models\jabatan;
use App\Models\Pejabat;
use App\Models\pengurusRw;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengurusRwController extends Controller
{
    //
    public function index()
    {
        $data = [
            'pejabats' => Pejabat::all(),
            'datawargas' => dataWarga::all()
        ];

        return view('admin.pengurusrw.index', $data);
    }

    public function simpan(Request $request)
    {

        $data = $request->validate([
            'nik' => ['required'],
            'id_pejabat' => ['required'],
            'nama_jabatan' => ['required'],
        ]);
        $update = Pejabat::where('id_pejabat', '=', $request->id_pejabat)->update($data);
        if ($update) {
            return redirect()->route('pengurusrw.index');
        } else {
            return redirect()->route('pengurusrw.tambah');
        }
    }

    public function formedit(Request $request)
    {
        $data = [
            'pejabat' => pejabat::where('id_pejabat', $request->id_pejabat)->first(),
            'datawarga' => dataWarga::select('nik', 'nama')->get()
        ];
        return view('admin.pengurusrw.edit', $data);
    }
}
