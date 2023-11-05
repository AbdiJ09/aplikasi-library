<?php

namespace App\Http\Controllers;

use App\Events\PeminjamanCreated;
use App\Events\PeminjamanCreatedListener;
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
        $peminjaman = Peminjaman::latest()->get();
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('dashboard.peminjaman.index', compact('peminjaman', 'anggota', 'buku'));
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
        $existingPeminjaman = Peminjaman::where('anggota_id', $request->anggota_id)->first();
        if ($existingPeminjaman) {
            return redirect()->back()->with('error', 'Anggota sudah melakukan peminjaman sebelumnya.');
        }

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
        $peminjaman->anggota_id = $request->anggota_id;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->lama_pinjam = $request->lama_pinjam;
        $peminjaman->status = 'dipinjam';
        $peminjaman->keterangan = $request->keterangan;
        $peminjaman->user_id = auth()->user()->id;
        $peminjaman->save();
        $peminjamanId = $peminjaman->id;
        $bukuId = $request->buku_id;

        foreach ($bukuId as $bookId) {
            $bukuSudahAda = PeminjamanDetail::where('peminjaman_id', $peminjamanId)
                ->where('buku_id', $bookId)
                ->exists();
            if (!$bukuSudahAda) {
                $peminjamanDetail = new PeminjamanDetail();
                $peminjamanDetail->peminjaman_id = $peminjamanId;
                $peminjamanDetail->buku_id = $bookId;
                $peminjamanDetail->jumlah = 1;
                $peminjamanDetail->save();

                // Kurangi stok buku
                $buku = Buku::find($bookId);
                $buku->jumlah_stok -= 1;
                $buku->save();
            }
        }
        return redirect()->back()->with('success', 'Peminjaman berhasil diupdate.');
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
