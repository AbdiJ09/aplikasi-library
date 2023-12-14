<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use PDO;

class Anggota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
