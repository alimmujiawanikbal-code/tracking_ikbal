<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    // Paksa nama tabel karena database kamu menggunakan 'lokasi' (bukan 'lokasis')
    protected $table = 'lokasi';

    // Daftarkan kolom 'nama' agar bisa diisi
    protected $fillable = ['nama'];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'lokasi_id');
    }
}
