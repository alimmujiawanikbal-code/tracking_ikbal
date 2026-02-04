<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Ganti 'categories' menjadi 'kategori' agar sinkron dengan tabel barang
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori'); // Saya sesuaikan agar lebih jelas
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
