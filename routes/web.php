<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| ROUTE USER
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome'); // USER
})->name('home');

/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // Beranda Admin
    Route::get('/beranda', [BerandaController::class, 'index'])
        ->name('admin.beranda');

    // Kendaraan
    Route::get('/kendaraan', [KendaraanController::class, 'index'])
        ->name('admin.kendaraan.index');

    Route::get('/kendaraan/create', [KendaraanController::class, 'create'])
        ->name('admin.kendaraan.create');

    Route::post('/kendaraan/store', [KendaraanController::class, 'store'])
        ->name('admin.kendaraan.store');

    Route::get('/kendaraan/edit/{id}', [KendaraanController::class, 'edit'])
        ->name('admin.kendaraan.edit');

    Route::post('/kendaraan/update/{id}', [KendaraanController::class, 'update'])
        ->name('admin.kendaraan.update');

    Route::get('/kendaraan/delete/{id}', [KendaraanController::class, 'destroy'])
        ->name('admin.kendaraan.delete');

    // Jenis Kendaraan
    Route::resource('jenis-kendaraan', JenisKendaraanController::class);

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])
        ->name('admin.transaksi.index');

    Route::get('/transaksi/create', [TransaksiController::class, 'create'])
        ->name('admin.transaksi.create');

    Route::post('/transaksi/store', [TransaksiController::class, 'store'])
        ->name('admin.transaksi.store');

        Route::get('/cek-db', function () {
    return response()->json([
        'default' => config('database.default'),
        'connection' => config('database.connections.' . config('database.default')),
    ]);
});

});
