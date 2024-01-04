<?php

namespace App\Models;

use App\Models\Anggota;
use App\Models\PeminjamanDetail;
use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $with = ['PeminjamanDetail.Buku', 'Anggota'];
    public function Anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('Anggota', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['anggota'] ?? false, function ($query, $anggota) {
            return $query->whereHas('Anggota', function ($query) use ($anggota) {
                $query->where('kode_anggota', 'like', '%' . $anggota . '%');
            });
        });
    }
    public function PeminjamanDetail()
    {
        return $this->hasMany(PeminjamanDetail::class, 'peminjaman_id');
    }
    public function Pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
