<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategory extends Model
{
    use HasFactory;

    protected $table = 'kategories';

    protected $guarded = [];

    public function buku()
    {
        return  $this->hasMany(Buku::class);
    }
}
