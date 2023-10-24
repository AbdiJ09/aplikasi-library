<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize('admin');
        $anggota = Anggota::all();
        return view('dashboard.index', compact('anggota'));
    }
}
