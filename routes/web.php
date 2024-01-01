<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataWargaController;
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
 * Halaman Login
 *  /login
 */
Route::get('/login',[AdminController::class,'formlogin']);

/**
 * halaman utama
 */
Route::prefix('/datawarga')->group(function(){
    Route::get('/',[DataWargaController::class,'index'])->name('datawarga.index');
    Route::get('/tambah',[DataWargaController::class,'formTambah'])->name('datawarga.tambah');
    Route::post('/simpan',[DataWargaController::class,'simpan'])->name('datawarga.simpan');
    Route::get('/edit/{nik}',[DataWargaController::class,'formEdit'])->name('datawarga.edit');
    Route::post('/hapus',[DataWargaController::class,'hapus'])->name('datawarga.hapus');
    Route::get('/detail/{nik}',[DataWargaController::class,'detail'])->name('datawarga.detail');


});