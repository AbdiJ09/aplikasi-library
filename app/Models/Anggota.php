<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Anggota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
