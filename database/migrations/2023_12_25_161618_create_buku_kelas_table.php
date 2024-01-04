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
        Schema::create('buku_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bukus_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->timestamps();
            $table->foreign('bukus_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_kelas');
    }
};
