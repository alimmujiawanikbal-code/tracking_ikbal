<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman; // Pastikan Model sudah ada

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil data peminjaman beserta detail barangnya
        $laporan = Peminjaman::with('user')->latest()->get();

        return view('laporan.index', compact('laporan'));
    }
}
