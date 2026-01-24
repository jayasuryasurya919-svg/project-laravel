<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
    {
        $kendaraans = Kendaraan::all();
        return view('admin.transaksi.create', compact('kendaraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'nama_peminjam' => 'required',
            'tanggal' => 'required|date',
            'lama_hari' => 'required|integer',
        ]);

        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);

        $totalHarga = $kendaraan->harga_sewa * $request->lama_hari;

        // FORMAT KE STRING
        $totalHargaFormatted = number_format($totalHarga, 0, ',', '.');

        Transaksi::create([
            'kendaraan_id' => $request->kendaraan_id,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal' => $request->tanggal,
            'lama_hari' => $request->lama_hari,
            'total_harga' => $totalHargaFormatted, // STRING
        ]);

        return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan');
    }
}
