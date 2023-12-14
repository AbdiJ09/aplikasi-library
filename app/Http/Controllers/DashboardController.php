<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest();
        if (request()->has('searchAnggota')) {
            $anggota->where('nama', 'like', '%' . request('searchAnggota') . '%');
        }
        return view('dashboard.index', ['anggota' => $anggota->paginate(5)])->with('success', 'Data Berhasil');
    }
}
