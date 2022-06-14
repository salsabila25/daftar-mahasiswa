<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaLumen extends Controller
{
    public function index()
    {
        return view('dashboard.mahasiswa-lumen.index');
    }
}
