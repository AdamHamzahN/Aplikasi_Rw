<?php

namespace App\Http\Controllers;

use App\Models\dataWarga;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class DataWargaController extends Controller
{
    //
    public $datawarga;

    public function __construct()
    {
        $this->datawarga = new dataWarga();
    }
    public function index()
    {
        $data = [
            'data_warga' => dataWarga::all()
        ];
        return view('admin.datawarga.index', $data);
    }

    public function detail(Request $request)
    {

        $data = [
            'warga' => dataWarga::where('nik', $request->nik)->first()

        ];
        return view('admin.datawarga.detail', $data);
    }

    public function formTambah()
    {
        return view('admin.datawarga.tambah');
    }


    public function simpan(Request $request)
    {
        $data = $request->validate([
            'nik' => ['required'],
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['date'],
            'agama' => ['required'],
            'pekerjaan' => ['nullable'],
            'alamat' => ['required'],
            'rt' => ['required'],
            'kontak' => ['required'],
            'foto' => 'image|file|max:2048'
        ]);

        //cek apakah kolom pekerjaan kosong
        if (empty($data['pekerjaan'])) {
            //jika kosong maka isi dengan 'belum bekerja'
            $data['pekerjaan'] = 'Belum Bekerja';
        }

        //periksa apakah nik sudah ada?
        $nikExists = dataWarga::where('nik', $request->nik)->exists();

        //jika ada maka update
        if ($nikExists) {
            if ($request->hasFile('foto')) {
                // Hapus foto lama dari penyimpanan
                $dataWarga = dataWarga::where('nik', '=', $request->nik)->first();
                Storage::delete($dataWarga->foto);

                // Simpan foto baru
                $data['foto'] = $request->file('foto')->store('foto_warga');
            }

            $update = dataWarga::where('nik', '=', $request->nik)->update($data);
            if ($update) {
                return redirect()->route('datawarga.index');
            } else {
                return redirect()->route('datawarga.tambah');
            }
        } else { 
            $data['foto'] = $request->file('foto')->store('foto_warga');
            $insert = dataWarga::create($data);
           
            if ($insert) {
                return redirect()->route('datawarga.index');
            } else {
                return redirect()->route('datawarga.tambah');
            }
        }
    }


    public function formEdit(Request $request)
    {

        $data = [
            'warga' => dataWarga::where('nik', $request->nik)->first()

        ];
        return view('admin.datawarga.edit', $data);
    }

    public function hapus(Request $request, Response $response)
    {
        //cek apakah data dengan nik yang di maksud ada di database?
        $check = dataWarga::where('nik', $request->nik)->get();
        if ($check->count() > 0) :
            //lakukan proses hapus
            $dataWarga = dataWarga::where('nik', $request->nik)->first();

            // Hapus foto jika ada
            if ($dataWarga->foto) {
                Storage::delete($dataWarga->foto);
            }

            // Hapus data warga dari tabel
            $hapus = $dataWarga->delete();

            //perikas apakah tudgas berhasil?
            if ($hapus) :
                //proses berhasil
                $pesan = [
                    'status' => true,
                    'pesan' => "data berhasil dihapus",
                ];
            else :
                //proses gagal
                $pesan = [
                    'status' => false,
                    'pesan' => "data gagal dihapus",
                ];
            endif;
        else :
            $pesan = [
                'status' => false,
                'pesan' => "data yang akan dihapus tidak ada",
            ];
        endif;
        return response()->json($pesan);
    }


    public function kirimWa(Request $request)
    {
        $data = [
            'datawarga' => dataWarga::where('nik', $request->nik)->first(),
        ];
        return view('admin.datawarga.kirim_wa', $data);
    }

    public function dataWarga(Request $request)
    {
        /**
         * method ini sbg endpoint API untuk 
         * Datatable serverside
         */
        if ($request->ajax()) :
            $data = $this->datawarga->get();
            return DataTables::of($data)->toJson();
        endif;
    }
}
