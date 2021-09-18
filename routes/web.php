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
Route::get('dashboard-manager', [DashboardController::class, 'dashboard_manager']);
Route::get('dashboard-hrd', [DashboardController::class, 'dashboard_hrd']);
Route::get('data-karyawan-hrd', [UsersController::class, 'data_karyawan_hrd']);
Route::post('ajaxRequest', [UsersController::class, 'ajax_cek'])->name('ajaxRequest.post');
Route::post('auth', [LoginController::class, 'auth']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('absensi-bulanan', [AbsensiController::class, 'bulanan'])->name('absensi-bulanan.filter');
Route::get('absensi-bulanan-manager', [AbsensiController::class, 'absensiBulanan_manager'])->name('absensi-bulanan-manager.filter');
Route::get('absensi-bulanan-hrd', [AbsensiController::class, 'absensiBulanan_hrd'])->name('absensi-bulanan-hrd.filter');
Route::get('absensi-harian-manager', [AbsensiController::class, 'absensiHariIni_manager']);
Route::get('absensi-harian-hrd', [AbsensiController::class, 'absensiHariIni_hrd']);
Route::get('izin-manager', [IzinController::class, 'izin_manager']);
Route::get('izin-hrd', [IzinController::class, 'izin_hrd']);
Route::post('ajaxAutoAbsen', [AbsensiController::class, 'ajax_autoabsen'])->name('ajaxAutoAbsen.post');