<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    // Jika nama tabelmu bukan 'peminjamans', buka komentar di bawah:
    // protected $table = 'peminjaman';
    protected $table = 'peminjaman';
    protected $fillable = [
        'kode_peminjaman',
        'nama_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];
}
