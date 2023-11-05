<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class DashboardPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with('Anggota')->get();
        $pengembalian = Pengembalian::with('Peminjaman.Anggota')->get();
        return view('dashboard.pengembalian.index', compact('pengembalian', 'peminjaman'));
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
        $peminjaman = Peminjaman::find($request->peminjaman_id);

        // Ambil semua detail peminjaman yang terkait
        $peminjamanDetail = $peminjaman->peminjamanDetail;

        foreach ($peminjamanDetail as $detail) {
            $buku = $detail->Buku;
            $buku->jumlah_stok += 1;
            $buku->save();
        }
        $pengembalianCount = Pengembalian::where('peminjaman_id', $request->peminjaman_id)->count();

        if ($pengembalianCount > 0) {
            return redirect()->back()->with('error', 'Pengembalian buku gagal dikirim.');
        }
        $formPengembalian = [
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_kembali' => $request->tanggal_kembali,
            'user_id' => auth()->user()->id
        ];
        if ($request->telat) {
            $formPengembalian['telat'] = $request->telat;
        }
        $pengembalian = Pengembalian::create($formPengembalian);


        $statusPeminjaman = $pengembalian->peminjaman_id;
        $peminjaman = Peminjaman::find($statusPeminjaman);
        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();

        $deletePeminjamanDetail = $pengembalian->peminjaman_id;
        $peminjamanDetail = PeminjamanDetail::where('peminjaman_id', $deletePeminjamanDetail)->get();
        foreach ($peminjamanDetail as $detail) {
            $detail->delete();
        }
        return redirect()->back()->with('success', 'Pengembalian buku berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
