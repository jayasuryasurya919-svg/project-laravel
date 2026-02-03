<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Cache;


class BerandaController extends Controller
{
    public function index()
    {
        $counts = Cache::remember('admin_dashboard_counts', now()->addMinutes(5), function () {
            return [
                'totalKendaraan' => Kendaraan::count(),
                'totalJenis' => JenisKendaraan::count(),
                'totalTransaksi' => Transaksi::count(),
            ];
        });

        return view('admin.beranda', [
            'kendaraans' => Kendaraan::with('jenisKendaraan')->latest()->take(5)->get(),
            'totalKendaraan' => $counts['totalKendaraan'],
            'totalJenis'     => $counts['totalJenis'],
            'totalTransaksi'=> $counts['totalTransaksi']
        ]);
    }
}
