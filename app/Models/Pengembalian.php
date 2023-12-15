<?php

namespace App\Models;

use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['Peminjaman.Anggota'];

    public function Peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'], function ($query, $anggota) {
            if ($anggota && strlen($anggota)) {
                return $query->whereHas('Peminjaman.Anggota', function ($query) use ($anggota) {
                    $query->where('nama', 'like', '%' . $anggota . '%');
                });
            }
        });
    }



    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
