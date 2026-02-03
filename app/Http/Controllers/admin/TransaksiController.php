<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['kendaraan', 'user'])->orderByDesc('id')->paginate(10);
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

    public function edit(Transaksi $transaksi)
    {
        $kendaraans = Kendaraan::all();
        return view('admin.transaksi.edit', compact('transaksi', 'kendaraans'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'nama_peminjam' => 'required',
            'tanggal' => 'required|date',
            'lama_hari' => 'required|numeric|min:1'
        ]);

        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);
        $total = $kendaraan->harga * $request->lama_hari;

        DB::transaction(function () use ($transaksi, $request, $total, $kendaraan) {
            $transaksi->update([
                'kendaraan_id' => $kendaraan->id,
                'nama_peminjam' => $request->nama_peminjam,
                'tanggal' => $request->tanggal,
                'lama_hari' => $request->lama_hari,
                'total_harga' => $total
            ]);
        });

        Cache::forget('admin_dashboard_counts');
        Cache::flush();

        return redirect()->route('admin.transaksi.index');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        Log::info('Admin menghapus transaksi', [
            'user_id' => auth()->id(),
            'transaksi_id' => $transaksi->id,
        ]);

        Cache::forget('admin_dashboard_counts');
        Cache::flush();

        return redirect()->route('admin.transaksi.index');
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

            DB::transaction(function () use ($kendaraan, $request, $total) {
                $transaksi = Transaksi::create([
                    'kendaraan_id' => $kendaraan->id,
                    'user_id' => null,
                    'nama_peminjam' => $request->nama_peminjam,
                    'tanggal' => $request->tanggal,
                    'lama_hari' => $request->lama_hari,
                    'total_harga' => $total
                ]);

                Log::info('Admin menambah transaksi', [
                    'user_id' => auth()->id(),
                    'transaksi_id' => $transaksi->id,
                ]);
            });

            Cache::forget('admin_dashboard_counts');
            Cache::flush();

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

        DB::transaction(function () use ($kendaraan, $request, $total) {
            $transaksi = Transaksi::create([
                'kendaraan_id' => $kendaraan->id,
                'user_id' => auth()->id(),
                'nama_peminjam' => auth()->user()->name,
                'tanggal' => $request->tanggal,
                'lama_hari' => $request->lama_hari,
                'total_harga' => $total
            ]);

            Log::info('User membuat transaksi', [
                'user_id' => auth()->id(),
                'transaksi_id' => $transaksi->id,
            ]);
        });

        Cache::forget('admin_dashboard_counts');
        Cache::flush();

        return redirect()->route('user.beranda');
    }
}
