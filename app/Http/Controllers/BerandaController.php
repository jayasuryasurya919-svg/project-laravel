<?php
namespace App\Http\Controllers;

use App\Models\Kendaraan;

class BerandaController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::with(['jenis', 'transaksiAktif'])->get();
        return view('beranda', compact('kendaraans'));
    }
}

