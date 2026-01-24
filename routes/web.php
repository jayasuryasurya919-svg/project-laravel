<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ==================
// HALAMAN UTAMA
// ==================
Route::get('/', function () {
    return view('welcome');
});

// ==================
// KENDARAAN (CRUD)
// ==================
Route::prefix('kendaraan')->group(function () {
    Route::get('/', [KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::get('/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
    Route::post('/store', [KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::get('/edit/{id}', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::post('/update/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::get('/delete/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.delete');
});

// ==================
// TRANSAKSI
// ==================
Route::prefix('transaksi')->group(function () {
    Route::get('/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/store', [TransaksiController::class, 'store'])->name('transaksi.store');
});

// ==================
// FALLBACK (404)
// ==================
Route::fallback(function () {
    abort(404);
});
