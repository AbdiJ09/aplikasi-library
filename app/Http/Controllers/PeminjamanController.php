<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use PDO;
use Spatie\FlareClient\View;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $peminjaman = Peminjaman::latest()->filter(['search' => $request->input('search'), 'anggota' => $request->input('anggota')])->get();
        if ($request->ajax()) {
            return response()->json(['peminjaman' => $peminjaman]);
        }

        return view('peminjaman', ['peminjaman' => $peminjaman]);
    }
    public function pinjamBuku(Request $request, string $slug)
    {
        $validate = $request->validate([
            'lama_pinjam' => 'required',
            'tanggal_pinjam' => 'required',
            'keterangan' => 'required'
        ]);
        if ($validate) {
            $buku = Buku::where('slug', $slug)->first();
            $anggota_id = auth()->user()->anggota->id;
            $peminjaman = Peminjaman::create([
                'anggota_id' => $anggota_id,
                'lama_pinjam' => $request->lama_pinjam,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'keterangan' => $request->keterangan,
                'status' => 'dipinjam',
                'user_id' => auth()->user()->id
            ]);
            $peminjamanDetail = PeminjamanDetail::create([
                'peminjaman_id' => $peminjaman->id,
                'buku_id' => $buku->id,
                'jumlah' => 1
            ]);
            return redirect()->back()->with('success', 'Buku Berhasil');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
