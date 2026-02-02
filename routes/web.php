<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// // --- Rute Register Manual (Taruh di Sini) ---
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// Rute Auth Bawaan (Login, Logout, Reset Password)
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard routes
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');
    Route::resource('users', App\Http\Controllers\Dashboard\UserController::class);

    // Tambahkan dua baris ini
    Route::resource('categories', App\Http\Controllers\Dashboard\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Dashboard\ProductController::class);
});
// laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
