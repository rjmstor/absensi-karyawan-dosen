<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;


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

// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/postregister', [AuthController::class, 'postregister']);
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin', 'auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard.index');
        Route::get('/dashboard/dosen', 'dosen')->name('dashboard.dosen');
        Route::patch('/dashboard/dosen/{id}/reset-sandi', 'resetSandiDosen')->name('resetSandiDosen');
        Route::get('/dashboard/dosen/{id}/rekap-absen', 'rekapAbsenDosen')->name('rekapAbsenDosen');
        Route::get('/dashboard/karyawan/{id}/rekap-absen', 'rekapAbsenKaryawan')->name('rekapAbsenKaryawan');
        Route::patch('/dashboard/karyawan/{id}/reset-sandi', 'resetSandiKaryawan')->name('resetSandiKaryawan');
        Route::get('/dashboard/karyawan', 'karyawan')->name('dashboard.karyawan');
        Route::get('/dashboard/absensi', 'absensi')->name('dashboard.absensi');
        Route::get('/dashboard/sent-email', 'sentMail')->name('dashboard.email');
        Route::post('/dashboard/simpan-absen', 'simpanAbsen')->middleware('auth')->name('simpanAbsen');
        Route::get('/dashboard/rekap-absen/{tanggal?}', 'rekapAbsen')->name('rekapAbsen');
        Route::get('/dashboard/print/rekap-absen/{tanggal?}', 'printRekapAbsen')->name('print.rekapAbsen');
        Route::get('/dashboard/export/rekap-absen/{tanggal?}', 'exportRekapAbsen')->name('export.rekapAbsen');
    });
});

Route::get('/home', [AbsenController::class, 'index'])->middleware(['auth']); //halaman absen
Route::post('/absen', [AbsenController::class, 'absensi'])->middleware('auth')->name('absen');

