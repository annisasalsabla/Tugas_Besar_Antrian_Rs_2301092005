<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AntrianController;

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
    });
});

Route::get('/daftar-antrian', [AntrianController::class, 'showForm'])->name('daftar.antrian');
Route::post('/daftar-antrian', [AntrianController::class, 'store']);
Route::get('/bukti-antrian/{id}', [AntrianController::class, 'bukti'])->name('bukti.antrian');
