<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\ProgramDonasiController;

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\KategoriProgramController;


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
Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/verifikasi', [RegisterController::class, 'verifikasi'])->middleware('guest');
Route::post('/verifikasi', [RegisterController::class, 'postverifikasi'])->middleware('guest');

Route::get('/validasi', [AuthController::class, 'indexvalidasi'])->middleware('auth');
Route::post('/validasi', [AuthController::class, 'validasi'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login')->middleware('guest');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/lupapassword', [ResetPasswordController::class, 'indexforgotpass'])->middleware('guest');
Route::post('/lupapassword', [ResetPasswordController::class, 'forgotpass'])->middleware('guest');

Route::get('/resetpassword/{token}', [ResetPasswordController::class, 'indexresetpass'])->name('reset.password.get')->middleware('guest');
Route::post('/resetpassword', [ResetPasswordController::class, 'resetpass'])->middleware('guest');

Route::get('/ubahpassword', [ChangePasswordController::class, 'index'])->middleware('auth');
Route::post('/ubahpassword', [ChangePasswordController::class, 'store'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::get('/createprogram', [ProgramDonasiController::class, 'index'])->middleware('auth');
Route::post('/createprogram', [ProgramDonasiController::class, 'store'])->middleware('auth');

Route::get('/riwayatprogram', [HomeController::class, 'riwayat'])->middleware('auth');

Route::get('/cek', function(){
    return view('cek');
});

//////////////////////////////ADMIN///////////////////////////////////////
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::get('/dash-kategoriprogram', [KategoriProgramController::class, 'index'])->middleware('admin');
Route::get('/dash-buatkategori', [KategoriProgramController::class, 'indexcreate'])->middleware('admin');
Route::post('/dash-buatkategori', [KategoriProgramController::class, 'store'])->middleware('admin');
Route::get('/dash-updatekategori/{slug}', [KategoriProgramController::class, 'indexupdate'])->name('updatekategori')->middleware('admin');
Route::post('/dash-updatekategori', [KategoriProgramController::class, 'update'])->middleware('admin');
Route::get('/dash-hapuskategori', [KategoriProgramController::class, 'destroy'])->middleware('admin');
Route::get('/dash-daftarprogram/{slug}', [KategoriProgramController::class, 'listprogram'])->name('programkategori')->middleware('admin');


Route::get('/createslugkategori', [KategoriProgramController::class, 'checkSlug'])->middleware('admin');

Route::get('/dash-program', [ProgramController::class, 'index'])->middleware('admin');
Route::get('/dash-buatprogram', [ProgramController::class, 'indexcreate'])->middleware('admin');
Route::post('/dash-buatprogram', [ProgramController::class, 'store'])->middleware('admin');



