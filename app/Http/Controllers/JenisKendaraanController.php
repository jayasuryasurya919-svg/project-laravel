<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    public function index()
    {
        $data = JenisKendaraan::all();
        return view('jenis_kendaraan.index', compact('data'));
    }

    public function create()
    {
        return view('jenis_kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        JenisKendaraan::create($request->all());

        return redirect()->route('jenis-kendaraan.index')
            ->with('success','Jenis kendaraan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = JenisKendaraan::findOrFail($id);
        return view('jenis_kendaraan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        JenisKendaraan::findOrFail($id)->update($request->all());

        return redirect()->route('jenis-kendaraan.index')
            ->with('success','Jenis kendaraan berhasil diupdate');
    }

    public function destroy($id)
    {
        JenisKendaraan::findOrFail($id)->delete();

        return redirect()->route('jenis-kendaraan.index')
            ->with('success','Jenis kendaraan berhasil dihapus');
    }
}
