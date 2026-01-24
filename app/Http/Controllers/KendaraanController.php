<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * TAMPILKAN DATA
     */
    public function index()
    {
      $kendaraan = Kendaraan::all();
    return view('admin.kendaraan.index', compact('kendaraan')); 
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        return view('admin.kendaraan.create');
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga_sewa' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kendaraan', 'public');
        }

        Kendaraan::create($data);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan');
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'harga_sewa' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kendaraan', 'public');
        }

        $kendaraan->update($data);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diupdate');
    }

    /**
     * HAPUS DATA
     */
    public function destroy($id)
    {
        Kendaraan::destroy($id);

        return redirect()
            ->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}
