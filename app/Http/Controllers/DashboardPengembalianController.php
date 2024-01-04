<?php

namespace App\Http\Controllers;

use DateInterval;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;

class DashboardPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $peminjaman = Peminjaman::with('Anggota')->where('status', 'dipinjam')->get();
        $result = $peminjaman->filter(function ($cek) {
            $tanggalBalikin = $cek->created_at->add(new DateInterval('P' . $cek->lama_pinjam . 'D'))->format('Y-m-d');
            return $tanggalBalikin < now()->format('Y-m-d');
        })->each(function ($item) {
            $item->tanggalBalikin = $item->created_at->add(new DateInterval('P' . $item->lama_pinjam . 'D'))->format('Y-m-d');
        });
        $pengembalian = Pengembalian::with('Peminjaman.Anggota')->get();
        return view('dashboard.pengembalian.index', compact('pengembalian', 'peminjaman', 'result'));
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

        $pengembalianCount = Pengembalian::where('peminjaman_id', $request->peminjaman_id)->count();
        if ($pengembalianCount > 0) {
            return redirect()->back()->with('error', 'Pengembalian buku gagal dikirim. Buku sudah dikembalikan sebelumnya.');
        }

        $peminjamanDetail = $peminjaman->peminjamanDetail;
        foreach ($peminjamanDetail as $detail) {
            $buku = $detail->Buku;
            $buku->jumlah_stok += 1;
            $buku->save();
        }

        $formPengembalian = [
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_kembali' => $request->tanggal_kembali,
            'user_id' => auth()->user()->id,
        ];

        if ($request->telat) {
            $formPengembalian['telat'] = $request->telat;
        }

        $pengembalian = Pengembalian::create($formPengembalian);

        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();
        $deletePeminjamanDetail = $pengembalian->peminjaman_id;
        PeminjamanDetail::where('peminjaman_id', $deletePeminjamanDetail)->delete();
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
        $validate = $request->validate([
            'peminjaman_id' => 'required',
        ]);

        if ($validate) {
            $pengembalian = Pengembalian::findOrFail($id);
            $pengembalian->update($validate);
            return redirect()->back()->with('success', 'Pengembalian buku berhasil diubah.');
        }
        return redirect()->back()->with('error', 'Pengembalian buku gagal diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
