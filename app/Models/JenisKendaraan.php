<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    protected $fillable = ['nama'];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class);
    }
}

