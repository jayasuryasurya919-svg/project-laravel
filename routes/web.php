<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| BERANDA / PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', [BerandaController::class, 'index'])->name('beranda');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    /*
    | Kendaraan
    | URL : /admin/kendaraan
    */
    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('kendaraan', KendaraanController::class)->only(['show']);

    /*
    | Jenis Kendaraan
    | URL : /admin/jenis-kendaraan
    */
    Route::resource('jenis-kendaraan', JenisKendaraanController::class);

    /*
    | Transaksi per Kendaraan
    | URL : /admin/transaksi/{kendaraan}
    */
   Route::get('/sewa/{kendaraan}', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/sewa/{kendaraan}', [TransaksiController::class, 'store'])->name('transaksi.store');
});
