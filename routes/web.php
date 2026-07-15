<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

// Login & Logout
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Hanya admin yang bisa tambah/edit/hapus — taruh di ATAS
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'tambahForm']);
    Route::post('/mahasiswa', [MahasiswaController::class, 'simpanWeb']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'editForm']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'updateWeb']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'hapusWeb']);
});

// Semua yang sudah login bisa lihat data — taruh di BAWAH
Route::middleware('auth')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'tampilWeb']);
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'detailWeb']);
});