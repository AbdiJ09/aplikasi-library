<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
