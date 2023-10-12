<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('judul', 255);
            $table->unsignedBigInteger('kategory_id');
            $table->string('penerbit', 50);
            $table->string('isbn');
            $table->string('pengarang', 150);
            $table->integer('jumlah_stok');
            $table->integer('tahun_terbit');
            $table->string('gambar', 255);
            $table->timestamps();
            $table->foreign('kategory_id')->references('id')->on('kategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
