<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];

    public function kelases()
    {
        return $this->belongsToMany(Kelas::class, 'buku_kelas', 'jurusans_id', 'kelas_id')->withTimestamps();
    }
    public function kelasJurusan(): BelongsToMany
    {
        return $this->belongsToMany(Kelas::class, 'kelas_jurusan', 'jurusans_id', 'kelas_id')->withTimestamps();
    }

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'buku_kelas', 'jurusans_id', 'bukus_id')->withTimestamps();
    }
}
