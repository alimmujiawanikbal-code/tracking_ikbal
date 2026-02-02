<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'kode_peminjaman', 'nama_peminjam', 'jenis_peminjam',
        'tanggal_pinjam', 'tanggal_kembali', 'status', 'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function detail_peminjaman(): HasMany
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}
