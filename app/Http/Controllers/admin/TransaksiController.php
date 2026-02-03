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
        $transaksis = Transaksi::with(['kendaraan', 'user'])->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function create(Request $request, ?Kendaraan $kendaraan = null)
    {
        if ($request->is('admin/*')) {
            $kendaraans = Kendaraan::all();
            return view('admin.transaksi.create', compact('kendaraans'));
        }

        if (!$kendaraan) {
            abort(404);
        }

        return view('user.sewa', compact('kendaraan'));
    }

    public function store(Request $request, ?Kendaraan $kendaraan = null)
    {
        if ($request->is('admin/*')) {
            $request->validate([
                'kendaraan_id' => 'required|exists:kendaraans,id',
                'nama_peminjam' => 'required',
                'tanggal' => 'required|date',
                'lama_hari' => 'required|numeric|min:1'
            ]);

            $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);
            $total = $kendaraan->harga * $request->lama_hari;

        Transaksi::create([
            'kendaraan_id' => $kendaraan->id,
            'user_id' => null,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal' => $request->tanggal,
            'lama_hari' => $request->lama_hari,
            'total_harga' => $total
        ]);

            return redirect()->route('admin.transaksi.index');
        }

        if (!$kendaraan) {
            abort(404);
        }

        $request->validate([
            'tanggal' => 'required|date',
            'lama_hari' => 'required|numeric|min:1'
        ]);

        $total = $kendaraan->harga * $request->lama_hari;

        Transaksi::create([
            'kendaraan_id' => $kendaraan->id,
            'user_id' => auth()->id(),
            'nama_peminjam' => auth()->user()->name,
            'tanggal' => $request->tanggal,
            'lama_hari' => $request->lama_hari,
            'total_harga' => $total
        ]);

        return redirect()->route('user.beranda');
    }
}
