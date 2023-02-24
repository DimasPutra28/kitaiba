<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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
