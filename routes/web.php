<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routing for Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'loginProcess']);
