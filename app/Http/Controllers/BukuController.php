<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Exports\BukuExport;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function index()
    {
        $books = Buku::latest()->take(8)->get();
        return view('home', compact('books'));
    }
    public function AllBuku(Request $request)
    {

        $allBooks = Buku::latest()->get();
        return view('buku.buku', compact('allBooks'));
    }
    public function detailBuku(string $slug)
    {
        $book = Buku::with('PeminjamanDetail')->where('slug', $slug)->first();
        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)->get();
        return view('buku.detailBuku', compact('book', 'peminjaman'));
    }
    public function search(Request $request)
    {
        $query = $request->input('search');
        $buku = Buku::query();

        if (!empty($query)) {
            $buku = $buku->where('judul', 'like', '%' . $query . '%');
        } else {
            $buku = $buku->when(empty($query), function ($query) {
                return $query->latest()->take(8);
            });
        }

        $buku = $buku->get();

        return response()->json(['buku' => $buku]);
    }


    public function export()
    {
        return Excel::download(new BukuExport, 'buku.xlsx');
    }
}
