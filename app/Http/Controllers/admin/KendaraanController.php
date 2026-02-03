<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::with('jenisKendaraan')->get();
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
            'nomor_polisi' => 'required',
            'harga' => 'required|numeric',
            'tahun' => 'required|numeric',
            'jenis_kendaraan_id' => 'required',
            'gambar' => 'nullable|image'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('kendaraan'), $namaFile);
            $gambar = 'kendaraan/'.$namaFile;
        }

        Kendaraan::create([
            'nama' => $request->nama,
            'nomor_polisi' => $request->nomor_polisi,
            'harga' => $request->harga,
            'tahun' => $request->tahun,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'gambar' => $gambar,
        ]);

        return redirect()->route('admin.kendaraan.index');
    }
      // 🔥 INI YANG KURANG
    public function destroy(Kendaraan $kendaraans)
    {
        $kendaraans->delete();

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}
