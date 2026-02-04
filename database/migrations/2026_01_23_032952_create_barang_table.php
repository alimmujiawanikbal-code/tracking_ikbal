<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            // Memastikan storage engine menggunakan InnoDB untuk mendukung foreign key
            $table->engine = 'InnoDB'; 
            
            $table->id(); 
            $table->string('nama_barang');

            // Kita gunakan kolom terpisah lalu definisikan foreign key secara manual
            // agar lebih "aman" dari error sinkronisasi tipe data
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('lokasi_id');

            $table->integer('stok');
            $table->timestamps();

            // Definisi relasi
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('lokasi_id')->references('id')->on('lokasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Matikan pengecekan foreign key agar drop table lancar
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('barang');
        Schema::enableForeignKeyConstraints();
    }
};