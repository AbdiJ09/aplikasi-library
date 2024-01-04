<?php

namespace App\Models;

use App\Models\Kategory;
use App\Models\Jurusan;
use App\Models\PeminjamanDetail;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;


    protected $guarded = [];
    public function kelases()
    {
        return $this->belongsToMany(Kelas::class, 'buku_kelas', 'bukus_id', 'kelas_id')->withTimestamps();
    }

    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class, 'buku_kelas', 'bukus_id', 'jurusan_id')->withTimestamps();
    }
    public function kategory()
    {
        return $this->belongsTo(Kategory::class);
    }
    public function PeminjamanDetail()
    {
        return $this->hasMany(PeminjamanDetail::class, 'bukus_id');
    }
    public function scopeFillter($query, array $filters)
    {
        $query->when($filters['query'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        });
    }
}
