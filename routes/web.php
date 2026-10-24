<?php

use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login.login');
});

// ----- LOGIN ----
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProses'])->name('login.proses');

// ----- REGISTER ----
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerProses'])->name('register.proses');

// ----- LOGOUT ----
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
