<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;

Route::apiResource('nilai', NilaiController::class);

Route::apiResource('mahasiswa', MahasiswaController::class);