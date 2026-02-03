<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiUserController extends Controller
{
    public function index(Request $request)
    {
        $transaksis = $request->user()
            ->transaksis()
            ->with('kendaraan')
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('user.transaksi', compact('transaksis'));
    }
}
