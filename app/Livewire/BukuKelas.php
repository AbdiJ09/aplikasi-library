<?php

namespace App\Livewire;

use App\Models\Kelas;
use Livewire\Component;
use App\Models\Buku_kelas;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class BukuKelas extends Component
{
    use WithPagination;
    public $kelas;
    public $jurusan;
    public $namaKelas;
    public $showSuccessAlert = false;
    #[On('bukuKelasCreated')]
    public function updatingBuku($books)
    {
        $this->showSuccessAlert = true;
        session()->flash('success', 'Buku Berhasil');
    }
    public function setkelas($id_jurusan, $id_kls)
    {
        $this->kelas = $id_kls;
        $this->jurusan = $id_jurusan;
    }

    public function mount()
    {
        $this->namaKelas = Kelas::with('jurusanKelas')->get();
    }
    public function render()
    {
        $books = Buku_kelas::when($this->jurusan, function ($query) {
            $query->whereHas('jurusan', function ($query) {
                $query->where('id', $this->jurusan);
            });
        })->when($this->kelas, function ($query) {
            $query->whereHas('kelas', function ($query) {
                $query->where('id', $this->kelas);
            });
        })->with('buku', 'jurusan', 'kelas')->latest()->paginate(5);
        return view('livewire.buku-kelas', ['bookss' => $books]);
    }
}
