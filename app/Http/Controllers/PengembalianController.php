<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengembalian::query();
        $fillter = $request->input('fillter');
        if ($fillter && $fillter !== "") {
            if ($fillter === "aman") {
                $query->where('telat', 0);
            } elseif ($fillter === "telat") {
                $query->where('telat', 1);
            }
        } else {
            $query->latest()->filter(['search' => $request->input('search')]);
        }
        $pengembalian = $query->get();
        if ($request->ajax()) {
            return response()->json(['pengembalian' => $pengembalian]);
        }
        return view('pengembalian', compact('pengembalian'));
    }
}
