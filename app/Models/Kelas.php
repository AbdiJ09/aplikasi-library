<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    protected $fillable = [
        'nama',
    ];

    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class, 'buku_kelas', 'kelas_id', 'jurusans_id')->withTimestamps();
    }
    public function jurusanKelas(): BelongsToMany
    {
        return $this->belongsToMany(Jurusan::class, 'kelas_jurusan', 'kelas_id', 'jurusans_id')->withTimestamps();
    }
    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'buku_kelas', 'kelas_id', 'bukus_id')->withTimestamps();
    }
}
