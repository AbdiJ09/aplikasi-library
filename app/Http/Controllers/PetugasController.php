<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(string $username)
    {
        $petugas = User::where('username', $username)->first();
        $peminjaman = Peminjaman::with('Anggota', 'PeminjamanDetail')
            ->where('petugas_id', function ($query) use ($username) {
                $query->select('id')
                    ->from('users')
                    ->where('username', $username);
            })
            ->groupBy('anggota_id')
            ->latest()
            ->get();

        return view('petugas', [
            'petugas' => $petugas,
            'peminjaman' => $peminjaman,
        ]);
    }
}
