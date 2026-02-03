<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'nama',
        'nomor_polisi',
        'harga',
        'tahun',
        'jenis_kendaraan_id',
        'gambar'
    ];

    public function jenisKendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class);
    }
}
