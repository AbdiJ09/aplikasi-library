<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->paginate(5);
        if (request()->has('searchAngota')) {
            $anggota->where('nama', 'like', '%' . request('searchAnggota') . '%');
        }
        return view('dashboard.index', ['anggota' => $anggota])->with('success', 'Data Berhasil');
    }
}
