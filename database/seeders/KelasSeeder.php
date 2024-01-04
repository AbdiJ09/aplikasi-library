<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            [
                "nama" => "X",
            ],
            [
                "nama" => "XI",
            ],
            [
                "nama" => "XII",
            ]
        ];
        foreach ($kelas as $k) {
            Kelas::create($k);
        }
    }
}
