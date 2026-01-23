<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisKendaraan;
use App\Models\Transaksi;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';

    protected $fillable = [
        'nomor_polisi',
        'merk',
        'tahun',
        'harga',
        'jenis_kendaraan_id',
        'gambar',
    ];

    public function jenis()
    {
        return $this->belongsTo(JenisKendaraan::class, 'jenis_kendaraan_id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    // ✅ INI YANG DIPAKAI CEK STATUS SEWA
    public function transaksiAktif()
    {
        return $this->hasOne(\App\Models\Transaksi::class)
                ->whereNull('tanggal_kembali');
    }
}
