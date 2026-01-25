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
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'total_harga' => 'required|numeric',
        ]);

        Transaksi::create($request->all());

        return redirect()
            ->route('admin.transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();

        return redirect()
            ->route('admin.transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}
