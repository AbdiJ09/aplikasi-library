<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kelas_jurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasJurusan = [
            [
                'kelas_id' => 5,
                'jurusans_id' => 5,
            ],
            [
                'kelas_id' => 5,
                'jurusans_id' => 6,
            ],
            [
                'kelas_id' => 5,
                'jurusans_id' => 7,
            ],
            [
                'kelas_id' => 6,
                'jurusans_id' => 5,
            ],
            [
                'kelas_id' => 6,
                'jurusans_id' => 6,
            ],
            [
                'kelas_id' => 6,
                'jurusans_id' => 7,
            ],
            [
                'kelas_id' => 7,
                'jurusans_id' => 5,
            ],
            [
                'kelas_id' => 7,
                'jurusans_id' => 6,

            ],
            [
                'kelas_id' => 7,
                'jurusans_id' => 7,
            ]
        ];
        foreach ($kelasJurusan as $value) {
            DB::table('kelas_jurusan')->insert($value);
        }
    }
}
