<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\http\Middleware\Role;


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

Route::middleware(['admin'])->group(function () {
    Route::controller(HidanganController::class)->group(function () {
        Route::get('/hidangan', 'index')->name('dashboard.hidangan');
        Route::post('/hidangan/store', 'store')->name('dashboard.hidangan.store');
        Route::get('/hidangan/edit/{id}', 'edit')->name('dashboard.hidangan.edit');
        Route::patch('/hidangan/update', 'update')->name('dashboard.hidangan.update');
        Route::delete('/hidangan/delete/{id}', 'delete')->name('dashboard.hidangan.delete');
    });
});

Route::get('/home', [AbsenController::class, 'index'])->middleware(['auth']); //halaman absen
Route::post('/absensi', [AbsenController::class, 'absensi'])->middleware('auth');

// Route::get('/home/admin/prodi', [AdminController::class, 'prodi']);
// Route::get('/home/admin/add-pbb', [AdminController::class, 'addpbb']);
// Route::post('/postpbb', [AdminController::class, 'postpbb']);
// Route::get('/home/admin/{id}/edit', [AdminController::class, 'editpbb']);
// Route::post('/home/admin/{id}/update', [AdminController::class, 'update']);
// Route::get('/home/admin/{id}/delete', [AdminController::class, 'destroy']);
