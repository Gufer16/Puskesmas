<?php

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\BiayaKonsultasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KonsultasiController;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PenjualanObatController;
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

    // ----- JADWAL -----
    Route::resource('/admin/jadwal', JadwalController::class);

    // ----- KONSULTASI -----
    Route::resource('/admin/konsultasi', KonsultasiController::class);

    // ----- BIAYA KONSULTASI -----
    Route::resource('/admin/biayaKonsultasi', BiayaKonsultasiController::class);

    // ----- OBAT -----
    Route::resource('/admin/obat', ObatController::class);

    // ----- TAMBAH STOK OBAT PROSES -----
    Route::patch('/admin/obat/{obat}/tambah-stok', [ObatController::class, 'tambahStokProses'])
        ->name('obat.tambahStokProses');

    // ----- PENJUALAN OBAT -----
    Route::resource('/admin/penjualanObat', PenjualanObatController::class);

    // ----- PENGGUNA -----
    Route::resource('/admin/pengguna', PenggunaController::class);

    // ----- AKUN -----
    Route::get('/admin/akun/index', [AkunController::class, 'index'])->name('akun.index');

    Route::get('/admin/akun/editProfile/{user}', [AkunController::class, 'edit'])->name('akun.edit');

    Route::patch('/admin/akun/editProfile/{user}', [AkunController::class, 'update'])->name('akun.update');

    Route::get('/admin/akun/editPassword/{user}', [AkunController::class, 'editPassword'])->name('akun.editPassword');

    Route::patch('/admin/akun/editPassword/{user}', [AkunController::class, 'ubahPasswordProses'])->name('akun.updatePassword');
});
