<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    public function index()
    {
        return view('admin.jenis_kendaraan.index', [
            'jenisKendaraans' => JenisKendaraan::all()
        ]);
    }

    public function create()
    {
        return view('admin.jenis_kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        JenisKendaraan::create($request->all());

        return redirect()->route('admin.jenis-kendaraan.index');
    }

    public function destroy($id)
    {
        JenisKendaraan::findOrFail($id)->delete();
        return back();
    }
}
