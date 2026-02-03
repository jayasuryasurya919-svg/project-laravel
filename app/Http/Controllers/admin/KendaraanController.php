<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::with('jenisKendaraan')->orderByDesc('id')->paginate(10);
        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        $jenisKendaraans = JenisKendaraan::all();
        return view('admin.kendaraan.create', compact('jenisKendaraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_polisi' => 'required|unique:kendaraans,nomor_polisi|regex:/^[A-Z0-9\\s-]+$/i',
            'harga' => 'required|numeric|min:1',
            'tahun' => 'required|integer|min:1990|max:'.(now()->year + 1),
            'jenis_kendaraan_id' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = Str::uuid()->toString().'_'.$file->getClientOriginalName();
            $file->move(public_path('kendaraan'), $namaFile);
            $gambar = 'kendaraan/'.$namaFile;
        }

        $kendaraan = Kendaraan::create([
            'nama' => $request->nama,
            'nomor_polisi' => $request->nomor_polisi,
            'harga' => $request->harga,
            'tahun' => $request->tahun,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'gambar' => $gambar,
        ]);

        Log::info('Admin menambah kendaraan', [
            'user_id' => auth()->id(),
            'kendaraan_id' => $kendaraan->id,
        ]);

        Cache::forget('admin_dashboard_counts');
        Cache::flush();

        return redirect()->route('admin.kendaraan.index');
    }
    public function show(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.show', compact('kendaraan'));
    }

    public function destroy(Kendaraan $kendaraans)
    {
        if ($kendaraans->gambar) {
            $path = public_path($kendaraans->gambar);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        $kendaraans->delete();

        Log::info('Admin menghapus kendaraan', [
            'user_id' => auth()->id(),
            'kendaraan_id' => $kendaraans->id,
        ]);

        Cache::forget('admin_dashboard_counts');
        Cache::flush();

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}
