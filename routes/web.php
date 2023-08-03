<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LoginController;
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
