<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanwargaController;
use App\Http\Controllers\AkunWargaController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengurusRwController;
use App\Http\Controllers\SuperAdminController;
use App\Models\dataWarga;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * Halaman Super Admin
 * /Super Admin
 */
Route::prefix('/superadmin')->group(function () {
     Route::get('/', [SuperAdminController::class, 'index'])->name('superadmin.index');
     Route::get('/data', [SuperAdminController::class, 'dataAdmin'])->name('superadmin.data');
     Route::get('/tambah', [SuperAdminController::class, 'tambahAdmin'])->name('superadmin.tambah');
     Route::post('/simpan', [SuperAdminController::class,'simpanAdmin'])->name('superadmin.simpan');
     Route::get('/edit/{id_admin}', [SuperAdminController::class, 'editAdmin'])->name('superadmin.edit');
     Route::post('/hapus', [SuperAdminController::class, 'hapusAdmin'])->name('superadmin.hapus');

});
/**
 * Halaman Admin
 * /admin
 */
Route::prefix('/admin')->group(function () {

    /**
     * Halaman Login
     *  /admin/login
     */
    Route::prefix('/login')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('login.index');
        Route::post('/check', [AdminController::class, 'check'])->name('login.check');
        
    });
    /**
     * halaman dashboard
     * /admin/dashboard
     */






    /**
     * Halaman Akun Warga
     * /admin/akunwarga
     */
    Route::prefix('/akunwarga')->group(function () {
        Route::get('/', [AkunWargaController::class, 'index'])->name('akunwarga.index');
        Route::get('/data', [AkunWargaController::class, 'dataAkunWarga'])->name('akunwarga.data');
        Route::get('/kirimwa/{nik}', [AkunWargaController::class, 'kirimWa'])->name('akunwarga.kirimwa');
    });

    /**
     * halaman data warga
     * /admin/datawarga
     */
    Route::prefix('/datawarga')->group(function () {
        Route::get('/', [DataWargaController::class, 'index'])->name('datawarga.index');
        Route::get('/data', [DataWargaController::class, 'dataWarga'])->name('datawarga.data');
        Route::get('/tambah', [DataWargaController::class, 'formTambah'])->name('datawarga.tambah');
        Route::post('/simpan', [DataWargaController::class, 'simpan'])->name('datawarga.simpan');
        Route::get('/edit/{nik}', [DataWargaController::class, 'formEdit'])->name('datawarga.edit');
        Route::post('/hapus', [DataWargaController::class, 'hapus'])->name('datawarga.hapus');
        Route::get('/detail/{nik}', [DataWargaController::class, 'detail'])->name('datawarga.detail');
    });

    /**
     * HALAMAN pengurus rw
     * /admin/pengurusrw
     */
    Route::prefix('/pengurusrw')->group(function () {
        Route::get('/', [PengurusRwController::class, 'index'])->name('pengurusrw.index');
        Route::get('/edit/{id_pejabat}', [PengurusRwController::class, 'formEdit'])->name('pengurusrw.edit');
        Route::post('/simpan', [PengurusRwController::class, 'simpan'])->name('pengurusrw.simpan');
    });
    /**
     * Halaman jabatan 
     * /admin/jabatan
     */
    Route::prefix('/jabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name('jabatan.index');
        Route::get('/data', [JabatanController::class, 'dataJabatan'])->name('jabatan.data');
        Route::get('/tambah', [JabatanController::class, 'tambah'])->name('jabatan.tambah');
        Route::post('/simpan', [JabatanController::class, 'simpan'])->name('jabatan.simpan');
        Route::get('/edit/{id_pejabat}', [JabatanController::class, 'formEdit'])->name('jabatan.edit');
        Route::post('/hapus', [JabatanController::class, 'hapus'])->name('jabatan.hapus');
    });
});
