<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create(Kendaraan $kendaraan)
    {
        return view('transaksi.create', compact('kendaraan'));
    }

    public function store(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'tanggal' => 'required|date',
            'lama_hari' => 'required|integer'
        ]);

        Transaksi::create([
            'kendaraan_id' => $kendaraan->id,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal' => $request->tanggal,
            'lama_hari' => $request->lama_hari,
            'total_harga' => $kendaraan->harga * $request->lama_hari,
        ]);

        return redirect('/')->with('success', 'Kendaraan berhasil disewa');
    }
}
