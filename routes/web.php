<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\User\BerandaController;

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::get('/', [BerandaController::class, 'index'])
    ->name('user.beranda');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

      Route::resource('kendaraan', \App\Http\Controllers\Admin\KendaraanController::class);
    Route::get('/beranda', [\App\Http\Controllers\Admin\BerandaController::class, 'index'])
        ->name('beranda');

    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('transaksi', TransaksiController::class);
});
