<?php

namespace App\Imports;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AnggotaImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $anggota =  Anggota::create([
                "kode_anggota" => $row[0],
                "nama" => $row[1],
                "jenis_kelamin" => $row[2],
                "tempat_lahir" => $row[3],
                "tanggal_lahir" => $this->transformDate($row[4]),
                "telpon" => $row[5],
                "alamat" => $row[6],
            ]);

            User::create([
                "name" => $anggota->nama,
                "username" => $anggota->kode_anggota,
                "password" => bcrypt('password'),
                "level" => 'user',
                'email' => $anggota->kode_anggota . '@gmail.com',
            ]);
            $anggota->update([
                'user_id' => User::where('username', $anggota->kode_anggota)->first()->id
            ]);
        }
    }
}
