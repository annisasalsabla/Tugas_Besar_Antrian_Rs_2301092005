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
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::middleware(['role:petugas'])->group(function () {
        Route::get('/petugas/dashboard', function () {
            return view('petugas.dashboard');
        })->name('petugas.dashboard');

        Route::get('/petugas/antrian', [PetugasAntrianController::class, 'index'])->name('petugas.antrian.index');
        Route::post('/petugas/antrian/{id}/panggil', [PetugasAntrianController::class, 'panggil'])->name('petugas.antrian.panggil');
        Route::post('/petugas/antrian/{id}/selesai', [PetugasAntrianController::class, 'selesai'])->name('petugas.antrian.selesai');
    });

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('admin/poli', App\Http\Controllers\Admin\PoliController::class);
        Route::resource('admin/petugas', App\Http\Controllers\Admin\PetugasController::class);
    });
});

Route::get('/daftar-antrian', [AntrianController::class, 'showForm'])->name('daftar.antrian');
Route::post('/daftar-antrian', [AntrianController::class, 'store']);
Route::get('/bukti-antrian/{id}', [AntrianController::class, 'bukti'])->name('bukti.antrian');
