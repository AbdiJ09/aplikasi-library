<?php

namespace App\Livewire\Pengembalian;

use App\Models\Pengembalian;
use Livewire\Attributes\On;
use Livewire\Component;
use PDO;

// Di dalam komponen Livewire
class Index extends Component
{
    public $query = '';
    public $pengembalian;
    #[On('fillter')]
    public function fillter($selectedOption)
    {
        $this->pengembalian = Pengembalian::query();
        if ($selectedOption) {
            if ($selectedOption == 'telat') {
                $this->pengembalian = $this->pengembalian->where('telat', 1);
            }
        }
        $this->pengembalian = $this->pengembalian->get();
    }
    #[On('search')]
    public function search($search)
    {
        $this->pengembalian = Pengembalian::query();
        if ($search) {
            $this->pengembalian = $this->pengembalian->whereHas('Peminjaman', function ($q) use ($search) {
                $q->whereHas('Anggota', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
            });
        }
        $this->pengembalian = $this->pengembalian->get();
    }
    public function mount()
    {
        $this->pengembalian = Pengembalian::get();
    }
    public function render()
    {
        return view('livewire.pengembalian.index');
    }
}
