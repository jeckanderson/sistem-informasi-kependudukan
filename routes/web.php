<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendatangController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PindahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Models\Kepala;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $kepalas = Kepala::all();
//     $lingkungan = [];
//     // $nilai = [];
//     foreach ($kepalas as $item) {
//         $lingkungan[] = $item->nama_lingkungan;
//     }

//     // if ($lingkungan == 'Lingkungan 1') {
//     //     $lingkungan->count();
//     // }
//     // dd(count($lingkungan)); 
//     dd(json_encode($lingkungan));

//     return view('home', [
//         'title' => 'Sistem Informasi Layanan Administrasi Kependudukan',
//         'lingkungan' => $lingkungan
//     ]);
// });
Route::get('/', [Controller::class, 'index']);

Route::resource('/dashboard/user', UserController::class)->middleware('is_admin');
Route::resource('/dashboard/kepala', KepalaController::class);
Route::get('/dashboard/kepala/inputak/{no_kk}', [KepalaController::class, 'inputak']);
Route::post('/dashboard/kepala/insert', [KepalaController::class, 'insert']);
Route::post('/dashboard/kepala/updateak/{no_kk}', [KepalaController::class, 'updateak']);
Route::get('/kepala/print_pdf/{nomor_kk}', [KepalaController::class, 'printpdf']);
Route::resource('/dashboard/penduduk', PendudukController::class);
Route::get('/penduduk/print_pdf', [PendudukController::class, 'printpdf']);
Route::resource('/dashboard/kelahiran', KelahiranController::class);
Route::get('/kelahiran/print_pdf', [KelahiranController::class, 'cetak_kel']);
Route::get('/kelahiran/print_kel/{id}', [KelahiranController::class, 'cetak_detail']);
Route::resource('/dashboard/pendatang', PendatangController::class);
Route::get('/pendatang/cetaklaporan', [PendatangController::class, 'cetaklap']);
Route::resource('/dashboard/pindah', PindahController::class);
Route::get('/pindah/cetaklaporan', [PindahController::class, 'cetaklap']);
Route::resource('/dashboard/kematian', KematianController::class);
Route::get('/kematian/cetaklaporan', [KematianController::class, 'cetaklap']);
Route::get('/kematian/cetaksurat/{id_kematian}', [KematianController::class, 'cetaksurat']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/pegawai', [PegawaiController::class, 'index'])->middleware('auth');
