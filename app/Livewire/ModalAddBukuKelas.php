<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ModalAddBukuKelas extends Component
{
    public $kelasId, $listKelas;
    public $jurusanId, $listJurusan;
    public $bukuIds = [];
    public $books;
    public function mount()
    {
        $this->listKelas = Kelas::all();
        $this->listJurusan = Jurusan::all();
        $this->books = Buku::all();
    }

    public function save()
    {
        $kelas = Kelas::find($this->kelasId) ?? Kelas::find($this->listKelas->first()->id);
        $this->kelasId = $kelas->id;
        $this->jurusanId = $this->jurusanId ?? $this->listJurusan->first()->id;
        $existingBukus = $this->getExistingBukus($kelas);
        $this->validateBukus($existingBukus);
        $kelas->bukus()->attach($this->bukuIds, ['jurusan_id' => $this->jurusanId]);
        $attachedBukus = $this->getAttachedBukus($kelas);
        $this->flashAndReset($attachedBukus);
    }

    private function getExistingBukus($kelas)
    {
        return $kelas->bukus()
            ->where('jurusan_id', $this->jurusanId)
            ->whereIn('bukus.id', $this->bukuIds)
            ->pluck('bukus.id')
            ->toArray();
    }

    private function validateBukus($existingBukus)
    {
        if (!empty($existingBukus)) {
            throw ValidationException::withMessages([
                'bukuIds' => 'Buku sudah terkait dengan kelas dan jurusan tertentu.'
            ]);
        }
    }

    private function getAttachedBukus($kelas)
    {
        return $kelas->bukus()->whereIn('bukus.id', $this->bukuIds)->pluck('bukus.id')->toArray();
    }

    private function flashAndReset($attachedBukus)
    {
        $this->dispatch('bukuKelasCreated', $attachedBukus);
        $this->reset('bukuIds');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modal-add-buku-kelas');
    }
}
