<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'kategori_id', 'lokasi_id',
        'kondisi', 'jumlah', 'satuan', 'tanggal_beli', 'harga', 'deskripsi', 'foto',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function detail_peminjaman(): HasMany
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}
