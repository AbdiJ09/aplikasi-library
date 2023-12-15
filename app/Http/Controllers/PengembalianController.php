<?php

namespace App\Http\Controllers;

use DateInterval;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $queryPeminjaman = Peminjaman::where('status', 'dipinjam');
        $fillter = $request->input('fillter');

        if ($request->has('search')) {
            $queryPeminjaman->whereHas('Anggota', function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $hasilPencarian = $queryPeminjaman->get();

        $result = $hasilPencarian->filter(function ($cek) {
            $tanggalBalikin = $cek->created_at->add(new DateInterval('P' . $cek->lama_pinjam . 'D'))->format('Y-m-d');
            return $tanggalBalikin < now()->format('Y-m-d');
        })->each(function ($item) {
            $item->tanggalBalikin = $item->created_at->add(new DateInterval('P' . $item->lama_pinjam . 'D'))->format('Y-m-d');
        });
        if ($fillter == "belum-dikembalikan") {
            if ($request->ajax()) {
                return response()->json([
                    'tidakDikembalikan' => $result,
                ]);
            }
        }


        $query = Pengembalian::with('Peminjaman')->latest();


        if ($fillter && $fillter !== "") {
            if ($fillter === "aman") {
                $query->where('telat', 0);
            } elseif ($fillter === "telat") {
                $query->where('telat', 1);
            }
        } else {
            $query->filter(['search' => $request->input('search')]);
        }

        $pengembalian = $query->get();
        if (!$fillter == "belum-dikembalikan") {
            if ($request->ajax()) {
                return response()->json(['pengembalian' => $pengembalian]);
            }
        }

        return view('pengembalian', [
            'pengembalian' => $pengembalian,
            'tidakDikembalikan' => $result,
            'tanggalBalikin' => $result->isEmpty() ? null : $result->first()->tanggalBalikin
        ]);
    }
}
