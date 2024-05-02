<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return view('admin.jabatan.tambah');
    }

    //menampilkan halaman edit
    public function formedit(Request $request){
        $data = [
            'daftar_jabatan' => jabatan::where('id_jabatan', $request->id_jabatan)->first()

        ];
        return view('admin.jabatan.edit',$data);
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
                return redirect()->route('jabatan.tambah');
            }
        else:
            //jika tidak ada maka masukan data baru
            $insert = jabatan::create($data);
            if($insert){
                return redirect()->route('jabatan.index');
            }else{
                return redirect()->route('jabatan.tambah');
            }
        endif;
        
    }

    public function hapus(Request $request,Response $response){
        //cek apakah data dengan nik yang di maksud ada di database?
        $check = jabatan::where('id_jabatan',$request->id_jabatan)->get();
        if($check->count() > 0) :
            //lakukan proses hapus
            $hapus = jabatan::where('id_jabatan',$request->id_jabatan)->delete();
            //perikas apakah tudgas berhasil?
            if($hapus):
                //proses berhasil
                $pesan = [
                    'status' => true,
                    'pesan' => "data berhasil dihapus",
                ];
            else:
                //proses gagal
                $pesan = [
                    'status' => false,
                    'pesan' => "data gagal dihapus",
                ];
            endif;
        else:
            $pesan = [
                'status' => false,
                'pesan' => "data yang akan dihapus tidak ada",
            ];
        endif;
        return response()->json($pesan);
    
       }
}
