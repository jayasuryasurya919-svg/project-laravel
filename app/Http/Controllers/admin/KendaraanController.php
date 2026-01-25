<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('admin.kendaraan.index', [
            'kendaraans' => Kendaraan::with('jenisKendaraan')->get()
        ]);
    }

    public function create()
    {
        return view('admin.kendaraan.create', [
            'jenisKendaraans' => JenisKendaraan::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_polisi' => 'required',
            'jenis_kendaraan_id' => 'required',
            'tahun' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        Kendaraan::create($request->all());

        return redirect()->route('admin.kendaraan.index');
    }

    public function edit($id)
    {
        return view('admin.kendaraan.edit', [
            'kendaraan' => Kendaraan::findOrFail($id),
            'jenisKendaraans' => JenisKendaraan::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        Kendaraan::findOrFail($id)->update($request->all());
        return redirect()->route('admin.kendaraan.index');
    }

    public function destroy($id)
    {
        Kendaraan::findOrFail($id)->delete();
        return back();
    }
}
