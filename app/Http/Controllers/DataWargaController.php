<?php

namespace App\Http\Controllers;

use App\Models\dataWarga;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataWargaController extends Controller
{
    //
    public function index()
    {
        $data = [
            'data_warga' => dataWarga::all()
        ];
        return view('datawarga.index', $data);
    }

    public function detail(Request $request)
    {

        $data = [
            'warga' => dataWarga::where('nik', $request->nik)->first()

        ];
        return view('datawarga.detail',$data);
    }

    public function formTambah()
    {
        return view('datawarga.tambah');
    }


   public function simpan(Request $request)
    {
        $data = $request->validate([
            'nik'=>['required'],
            'nama'=>['required'],
            'jns_kelamin'=>['required'], 
            'tempat_lahir'=>['required'],
            'tgl_lahir'=>['date'], 
            'ayah'=>['required'],
            'ibu'=>['required'],
            'pekerjaan'=>['nullable'], 
            'alamat'=>['required'], 
            'rt'=>['required'], 
            'kontak'=>['required']
        ]);

        //cek apakah kolom pekerjaan kosong
        if (empty($data['pekerjaan'])) {
            //jika kosong maka isi dengan 'belum bekerja'
            $data['pekerjaan'] = 'Belum Bekerja';
        }

        //periksa apakah nik sudah ada?
        $nikExists = dataWarga::where('nik', '=', $request->nik)->exists();
        
        //jika ada maka update
       if($nikExists):
        $update = dataWarga::where('nik','=',$request->nik)->update($data);
        if ($update) {
                return redirect()->route('datawarga.index');
            } else {
                return redirect()->route('datawarga.tambah');
            }
        //jika tidak tambahkan
        else : 
                $insert = dataWarga::create($data);
                if ($insert) {
                    return redirect()->route('datawarga.index');
                } else {
                    return redirect()->route('datawarga.tambah');
                }
            endif;
        
    }

    public function formEdit(Request $request)
    {

        $data = [
            'warga' => dataWarga::where('nik', $request->nik)->first()

        ];
        return view('datawarga.edit',$data);
    }

    public function hapus(Request $request,Response $response){
        //cek apakah data dengan nik yang di maksud ada di database?
        $check = dataWarga::where('nik',$request->nik)->get();
        if($check->count() > 0) :
            //lakukan proses hapus
            $hapus = dataWarga::where('nik',$request->nik)->delete();
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


