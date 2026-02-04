<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Mengambil data peminjaman terbaru
        $laporan = Peminjaman::latest()->get();

        return view('laporan.index', compact('laporan'));
    }
}
