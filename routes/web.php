<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Login\LoginController;
use App\Models\dokter;
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

// ----- ADMIN -----
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // ----- PASIEN -----
    Route::resource('/admin/pasien', PasienController::class);

    // ----- DOKTER -----
    Route::resource('/admin/dokter', DokterController::class);

    // ----- PENDAFTARAN -----
    Route::resource('/admin/pendaftaran', PendaftaranController::class);
});
