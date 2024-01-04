<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku_kelas extends Model
{
    use HasFactory;
    protected $table = 'buku_kelas';
    protected $guarded = ['id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'bukus_id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
