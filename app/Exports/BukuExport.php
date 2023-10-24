<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BukuExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Buku::all();
    }

    public function map($buku): array
    {
        return [
            $buku->kode_buku,
            $buku->judul,
            $buku->kategory->nama_kategory,
            $buku->penerbit,
            $buku->pengarang,
            $buku->jumlah_stok,
            $buku->tahun_terbit,
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Buku',
            'Judul',
            'Kategory',
            'Penerbit',
            'Pengarang',
            'Stok',
            'Tahun Terbit',
        ];
    }
}
