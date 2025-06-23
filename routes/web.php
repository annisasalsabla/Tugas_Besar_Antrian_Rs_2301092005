<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\Petugas\AntrianController as PetugasAntrianController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('poli', \App\Http\Controllers\Admin\PoliController::class);
        Route::resource('petugas', \App\Http\Controllers\Admin\PetugasController::class);
        Route::resource('pasien', \App\Http\Controllers\Admin\PasienController::class);
    });

    Route::middleware(['role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
        Route::get('/dashboard', function () {
            return view('petugas.dashboard');
        })->name('dashboard');

        Route::get('/antrian', [PetugasAntrianController::class, 'index'])->name('antrian.index');
        Route::post('/antrian/{id}/panggil', [PetugasAntrianController::class, 'panggil'])->name('antrian.panggil');
        Route::post('/antrian/{id}/selesai', [PetugasAntrianController::class, 'selesai'])->name('antrian.selesai');
    });
});

Route::get('/daftar-antrian', [AntrianController::class, 'showForm'])->name('daftar.antrian');
Route::post('/daftar-antrian', [AntrianController::class, 'store']);
Route::get('/bukti-antrian/{id}', [AntrianController::class, 'bukti'])->name('bukti.antrian');
