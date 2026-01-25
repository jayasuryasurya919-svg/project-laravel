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
    'nama_kendaraan',
    'jenis_kendaraan_id',
    'plat_nomor',
    'harga_sewa'
];

public function jenisKendaraan()
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
