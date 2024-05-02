<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanwargaController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengurusRwController;
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
        Route::get('/tambah', [PengurusRwController::class, 'tambah'])->name('pengurusrw.tambah');
        Route::post('/simpan', [PengurusRwController::class, 'simpan'])->name('datawarga.simpan');
        Route::get('/edit/{id_pengurus_rw}', [PengurusRwController::class, 'formEdit'])->name('datawarga.edit');
        Route::post('/hapus', [PengurusRwController::class, 'hapus'])->name('datawarga.hapus');
        Route::get('/detail/{id_pengurus_rw}', [PengurusRwController::class, 'detail'])->name('datawarga.detail');
    });
    /**
     * Halaman jabatan 
     * /pengurusrw/jabatan
     */
    Route::prefix('/jabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name('jabatan.index');
        Route::get('/tambah', [JabatanController::class, 'tambah'])->name('jabatan.tambah');
        Route::post('/simpan', [JabatanController::class, 'simpan'])->name('jabatan.simpan');
        Route::get('/edit/{id_jabatan}', [JabatanController::class, 'formEdit'])->name('jabatan.edit');
        Route::post('/hapus', [JabatanController::class, 'hapus'])->name('jabatan.hapus');
    });
});
