<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusan = [
            [
                'nama' => 'RPL',
            ],
            [
                'nama' => 'TKJ',
            ],
            [
                'nama' => 'TITL',
            ]
        ];
        foreach ($jurusan as $value) {
            Jurusan::create($value);
        }
    }
}
