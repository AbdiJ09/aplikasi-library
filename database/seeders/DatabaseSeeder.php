<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Anggota;
use App\Enums\StatusUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $anggota = Anggota::all();
        foreach ($anggota as $a) {
            $user = User::create([
                'name' => $a->nama,
                'username' => $a->nama . '123',
                'password' => bcrypt('password'),
                'level' => 'user',
                'email' => $a->nama . '@gmail.com',
            ]);

            $a->update([
                'user_id' => $user->id
            ]);
        }
    }
}
