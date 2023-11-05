<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $pengembalian = Pengembalian::latest()->filter(['search' => $request->input('search')])->get();
        if ($request->ajax()) {
            return response()->json(['pengembalian' => $pengembalian]);
        }
        return view('pengembalian', compact('pengembalian'));
    }
}
