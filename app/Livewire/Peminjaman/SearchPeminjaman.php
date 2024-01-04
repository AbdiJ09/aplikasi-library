<?php

namespace App\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\Attributes\Modelable;

class SearchPeminjaman extends Component
{
    #[Modelable]
    public $value = '';
    public function render()
    {
        return view('livewire.peminjaman.search-peminjaman');
    }
}
