<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        return view('admin.beranda');
    }
}
