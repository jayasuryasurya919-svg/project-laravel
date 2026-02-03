<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;

class KendaraanUserController extends Controller
{
    /**
     * Halaman beranda user (list kendaraan)
     */
    public function index()
    {
        $kendaraans = Kendaraan::with('jenisKendaraan')->get();

        return view('user.beranda', compact('kendaraans'));
    }

    /**
     * Detail kendaraan (user)
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('user.detail', compact('kendaraan'));
    }
}
