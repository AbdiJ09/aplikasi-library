<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Kelas;
use App\Models\Jurusan;
use Livewire\Component;
use App\Models\Buku_kelas;
use Illuminate\Support\Facades\Log;

class UpdateBukuKelas extends Component
{
    public $listKelas, $kelasId;
    public $listJurusan, $jurusanId;
    public $books;
    public $bukuIds = [];
    public function mount()
    {

        $this->listKelas = Kelas::all();
        $this->books = Buku::all();
        $this->listJurusan = Jurusan::all();
    }
    public function toggleBook($bookId)
    {
        if (in_array($bookId, $this->bukuIds)) {
            $this->bukuIds = array_diff($this->bukuIds, [$bookId]);
        } else {
            $this->bukuIds[] = $bookId;
        }
    }

    public function updatedKelasId($newKelasId)
    {
        $this->updateBukuIds();
    }

    public function updatedJurusanId($newJurusanId)
    {
        $this->updateBukuIds();
    }

    private function updateBukuIds()
    {
        if ($this->kelasId && $this->jurusanId) {
            $this->bukuIds = Buku_kelas::where('kelas_id', $this->kelasId)
                ->where('jurusan_id', $this->jurusanId)
                ->pluck('bukus_id')
                ->toArray();
        }
    }

    public function save()
    {
        $kelas = Kelas::find($this->kelasId);
        $kelas->bukus()->where('jurusan_id', $this->jurusanId)->detach();
        foreach ($this->bukuIds as $bukuId) {
            $kelas->bukus()->attach($bukuId, ['jurusan_id' => $this->jurusanId]);
        }
        $this->bukuIds = [];
    }

    public function render()
    {
        return view('livewire.update-buku-kelas');
    }
}
