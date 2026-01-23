<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    
    public function index()
    {
        $kendaraans = Kendaraan::with('jenis')->get();
        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        $jenis = JenisKendaraan::all();
        return view('admin.kendaraan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor_polisi' => 'required',
            'merk' => 'required',
            'tahun' => 'required|integer',
            'harga' => 'required|numeric',
            'jenis_kendaraan_id' => 'required',
            'gambar' => 'nullable|image',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kendaraan', 'public');
        }

        Kendaraan::create($data);

        return redirect()->route('kendaraan.index');
    }

    // 🔴 INI YANG MEMBUAT FORM EDIT MUNCUL
    public function edit(Kendaraan $kendaraan)
    {
        $jenis = JenisKendaraan::all();
        return view('admin.kendaraan.edit', compact('kendaraan', 'jenis'));
    }

    // 🔴 INI YANG MEMPERBAIKI ERROR $id
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $data = $request->validate([
            'nomor_polisi' => 'required',
            'merk' => 'required',
            'tahun' => 'required|integer',
            'harga' => 'required|numeric',
            'jenis_kendaraan_id' => 'required',
            'gambar' => 'nullable|image',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kendaraan', 'public');
        }

        $kendaraan->update($data);

        return redirect()->route('kendaraan.index');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index');
    }
}
