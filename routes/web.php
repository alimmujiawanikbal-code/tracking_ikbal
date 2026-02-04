<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () { return view('welcome'); });

Route::middleware('auth')->group(function () {
    // REDIRECT /home ke katalog agar tidak bingung
    Route::get('/home', [InventoryController::class, 'index'])->name('home');

    // --- GRUP ADMIN (Hanya bisa diakses admin) ---
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // Manajemen User
        Route::get('/users', [UserController::class, 'index'])->name('dashboard.users.index');

        // Inventory System (Barang, Kategori, Lokasi)
        Route::get('/barang', [InventoryController::class, 'index'])->name('dashboard.products.index');
        Route::get('/barang/tambah', [InventoryController::class, 'create'])->name('dashboard.barang.create');
        Route::post('/barang/simpan', [InventoryController::class, 'store'])->name('dashboard.barang.store');

        Route::get('/kategori', [InventoryController::class, 'indexCategory'])->name('dashboard.categories.index');

        Route::get('/lokasi/tambah', [InventoryController::class, 'createLocation'])->name('lokasi.create');
        Route::post('/lokasi/simpan', [InventoryController::class, 'storeLocation'])->name('lokasi.store');
    });

    // --- FITUR UMUM / PETUGAS ---
    Route::get('/peminjaman', [LoanController::class, 'index'])->name('peminjaman.index');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/panduan', function () { return view('panduan'); })->name('panduan');
});
// Inventory System (Barang, Kategori, Lokasi)
Route::get('/barang', [InventoryController::class, 'index'])->name('dashboard.products.index');
Route::get('/barang/tambah', [InventoryController::class, 'create'])->name('dashboard.barang.create');
Route::post('/barang/simpan', [InventoryController::class, 'store'])->name('dashboard.barang.store');

// FITUR KATEGORI LENGKAP
Route::get('/kategori', [InventoryController::class, 'indexCategory'])->name('dashboard.categories.index');
Route::get('/kategori/tambah', [InventoryController::class, 'createCategory'])->name('dashboard.categories.create');
Route::post('/kategori/simpan', [InventoryController::class, 'storeCategory'])->name('dashboard.categories.store');
use App\Http\Controllers\BarangController;

// ... route lainnya ...

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Ini yang mendefinisikan route barang.index, barang.create, dll.
    Route::resource('barang', BarangController::class);
});
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
