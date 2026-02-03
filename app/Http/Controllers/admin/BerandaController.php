<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;
use App\Models\Transaksi;


class BerandaController extends Controller
{
    public function index()
    {
        return view('admin.beranda', [
            'totalKendaraan' => Kendaraan::count(),
            'kendaraans' => Kendaraan::latest()->take(5)->get(),
            'totalJenis'     => JenisKendaraan::count(),
            'totalTransaksi'=> Transaksi::count()
        ]);
    }
}
