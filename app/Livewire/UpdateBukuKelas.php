<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Kelas;
use App\Models\Jurusan;
use Livewire\Component;

class UpdateBukuKelas extends Component
{
    public $item;
    public $listKelas;
    public $listJurusan;
    public $books;

    public function mount()
    {
        $this->listKelas = Kelas::all();
        $this->books = Buku::all();
        $this->listJurusan = Jurusan::all();
    }
    public function render()
    {
        return view('livewire.update-buku-kelas');
    }
}
