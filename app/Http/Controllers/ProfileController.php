<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;

        $totalPeminjamanSiswa = Peminjaman::where('user_id', $user_id)
            ->count();


        return view('profile', compact('totalPeminjamanSiswa'));
    }
}
