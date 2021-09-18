<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IzinController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::resource('/', LoginController::class);
Route::resource('profil', ProfilController::class);
Route::resource('data-karyawan', UsersController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('izin', IzinController::class);

Route::get('dashboard-karyawan', [DashboardController::class, 'dashboard_karyawan']);
Route::post('ajaxRequest', [UsersController::class, 'ajax_cek'])->name('ajaxRequest.post');
Route::post('/auth', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/absen_masuk', [AbsensiController::class, 'masuk']);
Route::get('absensi-bulanan', [AbsensiController::class, 'bulanan'])->name('absensi-bulanan.filter');
Route::post('ajaxAutoAbsen', [AbsensiController::class, 'ajax_autoabsen'])->name('ajaxAutoAbsen.post');