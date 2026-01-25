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
            'nama_kendaraan' => 'required',
            'jenis_kendaraan_id' => 'required',
            'plat_nomor' => 'required',
            'harga_sewa' => 'required',
        ]);

        Kendaraan::create([
            'nama_kendaraan' => $request->nama_kendaraan,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'plat_nomor' => $request->plat_nomor,
            'harga_sewa' => $request->harga_sewa,
        ]);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $jenisKendaraans = JenisKendaraan::all();

        return view('admin.kendaraan.edit', compact('kendaraan', 'jenisKendaraans'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->update($request->all());

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diupdate');
    }

    public function destroy($id)
    {
        Kendaraan::destroy($id);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}
