<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;

class BerandaController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('user.beranda', compact('kendaraans'));
    }
}
