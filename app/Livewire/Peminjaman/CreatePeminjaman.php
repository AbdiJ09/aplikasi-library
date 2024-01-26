<?php

namespace App\Livewire\Peminjaman;

use App\Models\Kelas;
use App\Models\Jurusan;
use Livewire\Component;
use App\Models\Buku_kelas;
use App\Models\Peminjaman;
use App\Events\PeminjamanCreated;
use App\Models\Buku;

class CreatePeminjaman extends Component
{
    public $anggota;
    public $buku;
    public $anggotaId;
    public $lama_pinjam;
    public $tanggal_pinjam;
    public $jumlah = 1;
    public $keterangan;
    public $listKelas, $kelasId;
    public $listJurusan, $jurusanId;
    public $bukuIds = [];
    public $selectAll = false;
    public $query;
    public $setAllBooks = false;


    public function setAll()
    {

        $this->selectAll = !$this->selectAll;

        if ($this->selectAll) {
            $this->bukuIds = [];
            foreach ($this->buku as $item) {
                $this->bukuIds[] = $this->setAllBooks ? $item->id : $item->buku->id;
            }
        } else {
            $this->bukuIds = [];
        }
    }
    public function save()
    {
        $this->validate([
            'anggotaId' => 'required',
            'bukuIds' => 'required',
            'lama_pinjam' => 'required',
            'keterangan' => 'required',
            'tanggal_pinjam' => 'required',
        ]);
        $peminjaman = Peminjaman::create([
            'anggota_id' => $this->anggotaId,
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'lama_pinjam' => $this->lama_pinjam,
            'status' => 'dipinjam',
            'keterangan' => $this->keterangan,
            'petugas_id' => auth()->user()->id,
        ]);
        $bukuId = $this->bukuIds;
        PeminjamanCreated::dispatch($peminjaman, $bukuId);

        $this->redirect(route('peminjaman.index'), navigate: true);
    }
    public function mount($anggota, $buku)
    {
    }
    public function updatedKelasId()
    {
        $this->handlePerubahanKelasJurusan();
    }
    public function updatedJurusanId()
    {
        $this->handlePerubahanKelasJurusan();
    }

    public function handlePerubahanKelasJurusan()
    {
        if ($this->kelasId && $this->jurusanId) {
            $this->setAllBooks = false;
            $this->buku = Buku_kelas::where('kelas_id', $this->kelasId)->where('jurusan_id', $this->jurusanId)->get();
        }
    }
    public function loadBukuKelasJurusan()
    {
        $this->tanggal_pinjam = date('Y-m-d');
        $this->anggota;
        $this->listKelas = Kelas::select('id', 'nama')->get();
        $this->kelasId = $this->kelasId ?? $this->listKelas->first()->id;
        $this->listJurusan = Jurusan::select('id', 'nama')->get();
        $this->jurusanId = $this->jurusanId ?? $this->listJurusan->first()->id;
        $this->buku = $this->setAllBooks ? Buku::where('judul', 'like', '%' . $this->query . '%')->get() : Buku_kelas::with(['buku'])->whereHas('buku', function ($q) {
            $q->where('judul', 'like', '%' . $this->query . '%');
        })->where('kelas_id', $this->kelasId)->where('jurusan_id', $this->jurusanId)->get();
    }
    public function render()
    {
        $this->loadBukuKelasJurusan();
        return view('livewire.peminjaman.create-peminjaman');
    }
    public function AllBooks()
    {
        $this->setAllBooks = true;
    }
}
