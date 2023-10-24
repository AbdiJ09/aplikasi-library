<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnggotaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Anggota::all();
    }
    public function map($anggota): array
    {
        return [
            $anggota->kode_anggota,
            $anggota->nama,
            $anggota->jenis_kelamin,
            $anggota->tempat_lahir,
            $anggota->tanggal_lahir,
            $anggota->telpon,
            $anggota->alamat,

        ];
    }

    public function headings(): array
    {
        return [
            [
                'Kode Anggota',
                'Nama',
                'Jenis Kelamin',
                'Tempat Lahir',
                'Tanggal Lahir',
                'Telpon',
                'Alamat',
            ],

        ];
    }
}
