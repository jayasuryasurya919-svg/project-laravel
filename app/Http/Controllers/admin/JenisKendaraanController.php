<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class JenisKendaraanController extends Controller
{
    public function index()
    {
        return view('admin.jenis_kendaraan.index', [
            'jenisKendaraans' => JenisKendaraan::orderByDesc('id')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.jenis_kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:jenis_kendaraans,nama'
        ]);

        $jenis = JenisKendaraan::create([
            'nama' => $request->nama,
        ]);

        Log::info('Admin menambah jenis kendaraan', [
            'user_id' => auth()->id(),
            'jenis_kendaraan_id' => $jenis->id,
        ]);

        Cache::forget('admin_dashboard_counts');
        Cache::flush();

        return redirect()->route('admin.jenis-kendaraan.index');
    }

    public function destroy($id)
    {
        $jenis = JenisKendaraan::findOrFail($id);
        $jenis->delete();

        Log::info('Admin menghapus jenis kendaraan', [
            'user_id' => auth()->id(),
            'jenis_kendaraan_id' => $jenis->id,
        ]);
        Cache::forget('admin_dashboard_counts');
        Cache::flush();
        return back();
    }
}
