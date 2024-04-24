<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    //menampilkan halaman pengurusrw.jabatan.index
    public function index()
    {
        $data = [
            'daftar_jabatan' => jabatan::all()
        ];
        return view('admin.jabatan.index', $data);
    }


    //menampilkan halaman tambah
    public function tambah(){
        return view('admin.jabatan.tambahjabatan');
    }

    //menampilkan halaman edit
    public function formedit(Request $request){
        $data = [
            'daftar_jabatan' => jabatan::where('id_jabatan', $request->id_jabatan)->first()

        ];
        return view('admin.jabatan.editjabatan',$data);
    }


    //fungsi untuk menyimpan data ke database
    public function simpan(Request $request){
        $data = $request->validate([
            'nama_jabatan'=>['required'],
        ]);

        //cek apakah id_jabatan sudah ada?
        if(isset($request->id_jabatan)):
            //jika ada maka update
            $update = jabatan::where('id_jabatan','=',$request->id_jabatan)->update($data);
            if($update){
                return redirect()->route('jabatan.index');
            }else{
                return redirect()->route('jabatan.tambahjabatan');
            }
        else:
            //jika tidak ada maka masukan data baru
            $insert = jabatan::create($data);
            if($insert){
                return redirect()->route('jabatan.index');
            }else{
                return redirect()->route('jabatan.tambahjabatan');
            }
        endif;
        
    }
}
