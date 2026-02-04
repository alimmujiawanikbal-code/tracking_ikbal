<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Mengambil data dari database (sesuaikan dengan query yang ada di log kamu)
        $total_barang = Barang::count();
        $sedang_dipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $total_selesai = Peminjaman::where('status', 'selesai')->count();
        $total_lokasi = \App\Models\Lokasi::count(); // Ambil jumlah lokasi

        // Ambil 5 barang terbaru beserta relasi lokasinya
        $barang_terbaru = Barang::with('lokasi')->latest()->take(5)->get();

        // Kirim semua variabel ke view
        return view('dashboard.index', compact(
            'total_barang',
            'sedang_dipinjam',
            'total_selesai',
            'total_lokasi',
            'barang_terbaru'
        ));
    }
}
