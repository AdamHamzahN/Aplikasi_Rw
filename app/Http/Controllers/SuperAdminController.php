<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminStoreRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class SuperAdminController extends Controller
{

     //
     public $admin;

     public function __construct(){
         $this->admin = new admin();
     }
 
    public function index(){
        return view('super_admin.index');
    }

    public function tambahAdmin()
    {
        return view('super_admin.tambah_admin');
    }

    public function editAdmin(Request $request)
    {
        /**
         * method ini hanya bisa diakses dengan http request GET
         */
        $data = [
            'data_admin' => admin::where('id_admin', $request->id_admin)->first()
        ];

        return view('super_admin.edit_admin', $data);
    }

    public function simpanAdmin(adminStoreRequest $request)
    {
        /**
         * meniympan data yang di input dari function tambah
         */

        $validated = $request->validated();


        if ($validated) {
            if (isset($request->id_admin)) :
                //update
                $perintah = admin::where('id_admin', $request->id_admin)->update($validated);
                if ($perintah) {
                    $pesan = [
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Diupdate'
                    ];
                } else {
                    $pesan = [
                        'status' => 'failed',
                        'pesan' => 'Data Gagal Diupdate'
                    ];
                }
            else :
                //buat data baru
                $perintah = admin::create($validated);
                if ($perintah) {
                    $pesan = [
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan'
                    ];
                } else {
                    $pesan = [
                        'status' => 'failed',
                        'pesan' => 'Data Gagal Ditambahkan'
                    ];
                }
            endif;
        } else {
            $pesan = [
                'status' => 'success',
                'pesan' => 'Data Gagal Ditambahkan,periksa kembali isian form nya'
            ];
        }


        return response()->json($pesan);
    }

    public function hapusAdmin(Request $request,Response $response){
        //cek apakah data dengan id_admin yang di maksud ada di database?
        $check = admin::where('id_admin',$request->id_admin)->get();
        if($check->count() > 0) :
            //lakukan proses hapus
            $hapus = admin::where('id_admin',$request->id_admin)->delete();
            //perikas apakah berhasil?
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

    public function dataAdmin(Request $request){
        if($request->ajax()):
           $data = $this->admin->get();
           return DataTables::of($data)->toJson();
        endif;
   }
}
