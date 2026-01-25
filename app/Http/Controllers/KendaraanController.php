<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;

class KendaraanController extends Controller
{
    /**
     * Tampilkan daftar kendaraan
     */
    public function index()
    {
        $kendaraans = Kendaraan::with('jenisKendaraan')->get();

        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    /**
     * Form tambah kendaraan
     */
    public function create()
    {
        $jenisKendaraans = JenisKendaraan::all();

        return view('admin.kendaraan.create', compact('jenisKendaraans'));
    }

    /**
     * Simpan data kendaraan
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kendaraan' => 'required',
            'jenis_kendaraan_id' => 'required',
            'plat_nomor' => 'required',
            'harga_sewa' => 'required|numeric',
        ]);

        Kendaraan::create([
            'nama_kendaraan' => $request->nama_kendaraan,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'plat_nomor' => $request->plat_nomor,
            'harga_sewa' => $request->harga_sewa,
        ]);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan');
    }

    /**
     * Detail kendaraan
     */
    public function show($id)
    {
        $kendaraan = Kendaraan::with('jenisKendaraan')->findOrFail($id);

        return view('admin.kendaraan.show', compact('kendaraan'));
    }

    /**
     * Form edit kendaraan
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $jenisKendaraans = JenisKendaraan::all();

        return view('admin.kendaraan.edit', compact('kendaraan', 'jenisKendaraans'));
    }

    /**
     * Update kendaraan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kendaraan' => 'required',
            'jenis_kendaraan_id' => 'required',
            'plat_nomor' => 'required',
            'harga_sewa' => 'required|numeric',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($request->all());

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diupdate');
    }

    /**
     * Hapus kendaraan
     */
    public function destroy($id)
    {
        Kendaraan::destroy($id);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus');
    }
}
