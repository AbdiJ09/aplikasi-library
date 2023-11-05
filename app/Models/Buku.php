<?php

namespace App\Models;

use App\Models\Kategory;
use App\Models\PeminjamanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $guarded = [];

    public function kategory()
    {
        return $this->belongsTo(Kategory::class);
    }
    public function PeminjamanDetail()
    {
        return $this->hasMany(PeminjamanDetail::class, 'buku_id');
    }
}
