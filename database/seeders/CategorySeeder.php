<?php

namespace Database\Seeders;

use App\Models\Kategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategories = [
            [
                'kode_kategory' => 'PP301',
                'nama_kategory' => 'novel',
            ],
            [
                'kode_kategory' => 'PP302',
                'nama_kategory' => 'komik',
            ],
            [
                'kode_kategory' => 'PP303',
                'nama_kategory' => 'majalah',
            ],
            [
                'kode_kategory' => 'PP304',
                'nama_kategory' => 'kamus',
            ],
            [
                'kode_kategory' => 'PP305',
                'nama_kategory' => 'manga',
            ],
            [
                'kode_kategory' => 'PP306',
                'nama_kategory' => 'pelajaran',
            ],
            [
                'kode_kategory' => 'PP307',
                'nama_kategory' => 'biografi',
            ],
            [
                'kode_kategory' => 'PP308',
                'nama_kategory' => 'dongeng',
            ],
        ];

        foreach($kategories as $item)
        {
            Kategory::create($item);
        }
    }
}
