<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

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

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function latestTransaksi()
    {
        return $this->hasOne(Transaksi::class)->latestOfMany('tanggal');
    }
}
