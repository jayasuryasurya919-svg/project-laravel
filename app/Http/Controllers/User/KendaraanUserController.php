<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\JenisKendaraan;
use Illuminate\Support\Facades\Cache;

class KendaraanUserController extends Controller
{
    /**
     * Halaman beranda user (list kendaraan)
     */
    public function index()
    {
        $filters = [
            'nama' => request('nama'),
            'nomor_polisi' => request('nomor_polisi'),
            'jenis_kendaraan_id' => request('jenis_kendaraan_id'),
            'sort' => request('sort', 'terbaru'),
            'page' => request('page', 1),
        ];

        $cacheKey = 'user_kendaraans_' . md5(json_encode($filters));

        $kendaraans = Cache::remember($cacheKey, now()->addMinutes(3), function () use ($filters) {
            $query = Kendaraan::with(['jenisKendaraan', 'latestTransaksi'])
                ->when($filters['nama'], function ($q, $nama) {
                    $q->where('nama', 'like', '%' . $nama . '%');
                })
                ->when($filters['nomor_polisi'], function ($q, $nopol) {
                    $q->where('nomor_polisi', 'like', '%' . $nopol . '%');
                })
                ->when($filters['jenis_kendaraan_id'], function ($q, $jenisId) {
                    $q->where('jenis_kendaraan_id', $jenisId);
                });

            if ($filters['sort'] === 'harga_asc') {
                $query->orderBy('harga');
            } elseif ($filters['sort'] === 'harga_desc') {
                $query->orderByDesc('harga');
            } else {
                $query->orderByDesc('id');
            }

            return $query->paginate(9);
        });

        $jenisKendaraans = JenisKendaraan::orderBy('nama')->get();

        return view('user.beranda', compact('kendaraans', 'jenisKendaraans', 'filters'));
    }

    /**
     * Detail kendaraan (user)
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('user.detail', compact('kendaraan'));
    }
}
