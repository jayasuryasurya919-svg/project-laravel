<?php

use App\Http\Controllers\User\BerandaController as UserBeranda;
use App\Http\Controllers\Admin\BerandaController as AdminBeranda;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\JenisKendaraanController;


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::get('/', [UserBeranda::class, 'index'])->name('user.beranda');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminBeranda::class, 'index'])->name('beranda');
    Route::resource('kendaraan', KendaraanController::class);
    Route::get('/transaksi', [TransaksiController::class, 'index'])
        ->name('transaksi.index');
    Route::resource('jenis-kendaraan', JenisKendaraanController::class);
});
