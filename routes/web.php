<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routing for Login & Logout
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'loginProcess']);
Route::get('/logout', [LoginController::class, 'logoutProcess']);

// Routing for Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Routing for Kuis
Route::get('/kuis', [KuisController::class, 'index']);
Route::post('/kuis', [KuisController::class, 'store']);
Route::get('/kuis/{kuisId}/edit', [KuisController::class, 'edit']);
Route::post('/kuis/{kuisId}/update', [KuisController::class, 'update']);
Route::post('/kuis/drop', [KuisController::class, 'destroy']);
Route::post('/kuis/soal/store', [KuisController::class, 'soalStore']);
Route::post('/kuis/soal/drop', [KuisController::class, 'soalDestroy']);
Route::post('/kuis/soal/update-process', [KuisController::class, 'soalUpdate']);
Route::post('/kuis/play', [KuisController::class, 'playKuis']);
Route::post('/kuis/play/submit', [KuisController::class, 'playKuisSubmit']);

// Routing for Nilai
Route::get('/nilai', [NilaiController::class, 'index']);

// Routing for Nilai
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::post('/siswa/drop', [SiswaController::class, 'destroy']);
Route::post('/siswa/update', [SiswaController::class, 'update']);

// Route for pengajar
Route::get('/pengajar', [PengajarController::class, 'index']);
Route::post('/pengajar', [PengajarController::class, 'store']);
Route::post('/pengajar/drop', [PengajarController::class, 'destroy']);
Route::post('/pengajar/update', [PengajarController::class, 'update']);

// Route for orangtua
Route::get('/orangtua', [OrangtuaController::class, 'index']);
Route::post('/orangtua', [OrangtuaController::class, 'store']);
Route::post('/orangtua/drop', [OrangtuaController::class, 'destroy']);
Route::post('/orangtua/update', [OrangtuaController::class, 'update']);

// Route for komentar
Route::post('/komentar/update', [KomentarController::class, 'update']);
