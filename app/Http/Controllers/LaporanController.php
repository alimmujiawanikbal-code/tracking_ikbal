<?php

namespace App\Http\Controllers;

class LaporanController extends Controller
{
    public function index()
    {
        // Kita buat data manual (dummy) dulu supaya tidak error kalau tabel masih kosong
        $laporan = collect([
            (object) [
                'kode_peminjaman' => 'PMJ-001',
                'nama_peminjam' => 'Ijat',
                'tanggal_pinjam' => '2026-02-02',
                'tanggal_kembali' => null,
                'status' => 'dipinjam',
            ],
        ]);

        return view('laporan.index', compact('laporan'));
    }
}
