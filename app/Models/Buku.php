<?php

namespace App\Models;

use App\Models\Kategory;
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
}
