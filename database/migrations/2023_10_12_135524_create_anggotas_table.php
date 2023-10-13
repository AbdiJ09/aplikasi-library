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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_anggota');
            $table->string('nama', 255);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('telpon');
            $table->text('alamat');
            $table->string('foto', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
