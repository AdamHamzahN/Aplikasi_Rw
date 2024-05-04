<?php

namespace App\Http\Controllers;

use App\Models\akunWarga;
use App\Models\dataWarga;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AkunWargaController extends Controller
{
    public $akun_warga;

    public function __construct(){
        $this->akun_warga = new akunWarga();
    }

    public function index(){
        return view('admin.akun_warga.index');
    }

    public function kirimWa(Request $request){
        $data =[
            'datawarga'=>dataWarga::where('nik',$request->nik)->first(),
            'akun'=>akunWarga::where('nik', $request->nik)->first()
        ];
        return view('admin.akun_warga.kirim_wa',$data);
    }

    public function dataakunWarga(Request $request){
         if($request->ajax()):
            $data = $this->akun_warga->with('nik')->get();
            return DataTables::of($data)->toJson();
         endif;
    }
}
