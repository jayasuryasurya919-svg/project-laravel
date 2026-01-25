<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('kendaraan')->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

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
            'lama_hari' => 'required|numeric'
        ]);

        $kendaraan = Kendaraan::find($request->kendaraan_id);
        $total = $kendaraan->harga * $request->lama_hari;

        Transaksi::create([
            'kendaraan_id' => $request->kendaraan_id,
            'nama_peminjam' => $request->nama_peminjam,
            'lama_hari' => $request->lama_hari,
            'total_harga' => $total
        ]);

        return redirect()->route('admin.transaksi.index');
    }
}
