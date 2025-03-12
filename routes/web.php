<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Auth::routes();

// Grup route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('Dashboard/Admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
});

// Grup route untuk anggota
Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::get('Dashboard/Anggota', [DashboardController::class, 'anggotaDashboard'])->name('dashboard.anggota');
});

// Grup route untuk user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('Dashboard/Rizdatha', [DashboardController::class, 'userDashboard'])->name('dashboard');
    Route::post('Dashboard/Rizdatha/update', [UserController::class, 'update'])->name('user.update');
});

// Route lama (tidak digunakan)
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');