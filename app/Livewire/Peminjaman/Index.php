<?php

namespace App\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\Attributes\On;
use App\Livewire\Peminjaman\SearchPeminjaman;

class Index extends Component
{
    public $query;
    public function render()
    {
        return view('livewire.peminjaman.index', [
            'peminjaman' => Peminjaman::whereHas('Anggota', function ($query) {
                $query->where('nama', 'like', '%' . $this->query . '%');
            })->latest()->get()
        ]);
    }
}
