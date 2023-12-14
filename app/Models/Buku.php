<?php

namespace App\Models;

use App\Models\Kategory;
use App\Models\PeminjamanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function kategory()
    {
        return $this->belongsTo(Kategory::class);
    }
    public function PeminjamanDetail()
    {
        return $this->hasMany(PeminjamanDetail::class, 'buku_id');
    }

    public function scopeFillter($query, array $filters)
    {
        $query->when($filters['query'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        });
    }
}
