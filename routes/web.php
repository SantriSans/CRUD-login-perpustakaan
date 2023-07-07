<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SirkulasiController;

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
    return view('login');
})->middleware('tamu');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/chart', [mahasiswaController::class, 'chart'])->middleware('isLogin');
Route::get('/mhs/cetak_pdf', [mahasiswaController::class, 'cetak_pdf'])->middleware('isLogin');

Route::get('/index-mhs', [mahasiswaController::class, 'index'])->middleware('isLogin');
Route::get('/index-mhs/cari', [mahasiswaController::class, 'cari'])->middleware('isLogin');
Route::get('/tambah-mhs', [mahasiswaController::class, 'indexTambah'])->middleware('isLogin');
Route::post('/store-mhs', [mahasiswaController::class, 'store'])->middleware('isLogin');
Route::get('/edit-mhs/{id}', [mahasiswaController::class, 'edit'])->middleware('isLogin');
Route::post('/update-mhs', [mahasiswaController::class, 'update'])->middleware('isLogin');
Route::get('/delete-mhs/{id}', [mahasiswaController::class, 'delete'])->middleware('isLogin');
Route::get('/getProdi', [mahasiswaController::class, 'getProdi'])->middleware('isLogin');

Route::get('/pdf', function () {
    return view('mahasiswa_pdf');
});

Route::get('/buku', [BukuController::class, 'index'])->middleware('isLogin');
Route::get('/buku/cari', [BukuController::class, 'cari'])->middleware('isLogin');
Route::get('/tambah-buku', [BukuController::class, 'indexTambah'])->middleware('isLogin');
Route::post('/store-buku', [BukuController::class, 'store'])->middleware('isLogin');
Route::get('/edit-buku/{id}', [BukuController::class, 'edit'])->middleware('isLogin');
Route::post('/update-buku', [BukuController::class, 'update'])->middleware('isLogin');
Route::get('/delete-buku/{id}', [BukuController::class, 'delete'])->middleware('isLogin');

Route::get('/sirkulasi', [SirkulasiController::class, 'index'])->middleware('isLogin');
Route::get('/sirkulasi/cari', [SirkulasiController::class, 'cari'])->middleware('isLogin');
Route::get('/tambah-sirkulasi', [SirkulasiController::class, 'indexTambah'])->middleware('isLogin');
Route::post('/store-sirkulasi', [SirkulasiController::class, 'store'])->middleware('isLogin');
Route::get('/edit-sirkulasi/{id}', [SirkulasiController::class, 'edit'])->middleware('isLogin');
Route::post('/update-sirkulasi', [SirkulasiController::class, 'update'])->middleware('isLogin');
Route::get('/delete-sirkulasi/{id}', [SirkulasiController::class, 'delete'])->middleware('isLogin');

Route::get('/sirkulasi/pilih_sirkulasi', [SirkulasiController::class, 'pilih_sirkulasi'])->middleware('isLogin');

Route::post('/sirkulasi/cetak_pdf', [SirkulasiController::class, 'cetak_pdf'])->middleware('isLogin');

Route::get('/pdf', function () {
    return view('sirkulasi_pdf');
});