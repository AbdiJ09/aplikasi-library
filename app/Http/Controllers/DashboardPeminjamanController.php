<?php

namespace App\Http\Controllers;

use App\Events\PeminjamanCreated;
use App\Events\PeminjamanCreatedListener;
use App\Events\PeminjamanUpdated;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;

class DashboardPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $cekPeminjaman = Peminjaman::all();

        $matchingPeminjaman = [];
        if (request()->fillter == "") {
            $matchingPeminjaman = $cekPeminjaman;
        } elseif (request()->fillter == "byAnggota") {
            foreach ($cekPeminjaman as $pem) {
                if ($pem->Anggota->user_id == $pem->user_id) {
                    $matchingPeminjaman[] = $pem;
                }
            }
        } elseif (request()->fillter == "byPetugas") {
            foreach ($cekPeminjaman as $pem) {
                if ($pem->Anggota->user_id != $pem->user_id) {
                    $matchingPeminjaman[] = $pem;
                }
            }
        } else {
            $matchingPeminjaman = $cekPeminjaman;
        }
        $anggota = Anggota::all();
        $buku = Buku::latest()->fillter(request(['query']))->get();
        if (request()->ajax()) {
            return response()->json(['buku' => $buku]);
        }
        return view('dashboard.peminjaman.index', compact('matchingPeminjaman', 'anggota', 'buku'));
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
        // $existingPeminjaman = Peminjaman::where('anggota_id', $request->anggota_id)->first();
        // if ($existingPeminjaman) {
        //     return redirect()->back()->with('error', 'Anggota sudah melakukan peminjaman sebelumnya.');
        // }

        $peminjaman = Peminjaman::create([
            'anggota_id' => $request->anggota_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'lama_pinjam' => $request->lama_pinjam,
            'status' => 'dipinjam',
            'keterangan' => $request->keterangan,
            'user_id' => auth()->user()->id,
        ]);
        $bukuId = $request->buku_id;
        PeminjamanCreated::dispatch($peminjaman, $bukuId);
        return redirect()->back()->with('success', 'Peminjaman berhasil disimpan.');
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
    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::find($id);

        if ($peminjaman) {
            $peminjaman->update([
                'anggota_id' => $request->anggota_id,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'lama_pinjam' => $request->lama_pinjam,
                'status' => 'dipinjam',
                'keterangan' => $request->keterangan,
                'user_id' => auth()->user()->id,
            ]);

            $bukuId = $request->buku_id;

            PeminjamanUpdated::dispatch($peminjaman, $bukuId);

            return redirect()->back()->with('success', 'Peminjaman berhasil diupdate.');
        } else {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($peminjaman->id);
        $peminjaman->delete();
        return redirect()->back()->with('success', 'Peminjaman berhasil dihapus.');
    }
}
