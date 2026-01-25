<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

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
     * Tampilkan form tambah kendaraan
     */
    public function create()
    {
        $jenisKendaraans = JenisKendaraan::all();
        return view('admin.kendaraan.create', compact('jenisKendaraans'));
    }

    /**
     * Simpan data kendaraan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kendaraan'       => 'required|string|max:255',
            'jenis_kendaraan_id'   => 'required|exists:jenis_kendaraans,id',
            'plat_nomor'           => 'required|string|max:20',
            'harga_sewa'           => 'required|numeric',
            'status'               => 'required|string'
        ]);

        Kendaraan::create([
            'nama_kendaraan'     => $request->nama_kendaraan,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'plat_nomor'         => $request->plat_nomor,
            'harga_sewa'         => $request->harga_sewa,
            'status'             => $request->status,
        ]);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan');
    }

    /**
     * Tampilkan detail kendaraan
     */
    public function show($id)
    {
        $kendaraan = Kendaraan::with('jenisKendaraan')->findOrFail($id);
        return view('admin.kendaraan.show', compact('kendaraan'));
    }

    /**
     * Tampilkan form edit kendaraan
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $jenisKendaraans = JenisKendaraan::all();

        return view('admin.kendaraan.edit', compact('kendaraan', 'jenisKendaraans'));
    }

    /**
     * Update data kendaraan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kendaraan'       => 'required|string|max:255',
            'jenis_kendaraan_id'   => 'required|exists:jenis_kendaraans,id',
            'plat_nomor'           => 'required|string|max:20',
            'harga_sewa'           => 'required|numeric',
            'status'               => 'required|string'
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update([
            'nama_kendaraan'     => $request->nama_kendaraan,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'plat_nomor'         => $request->plat_nomor,
            'harga_sewa'         => $request->harga_sewa,
            'status'             => $request->status,
        ]);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diperbarui');
    }

    /**
     * Hapus kendaraan
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}
