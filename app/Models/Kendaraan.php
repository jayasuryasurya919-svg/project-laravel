<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'nama',
        'nomor_polisi',
        'jenis_kendaraan_id',
        'tahun',
        'harga',
        'gambar'
    ];

    public function jenisKendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class);
    }
}
