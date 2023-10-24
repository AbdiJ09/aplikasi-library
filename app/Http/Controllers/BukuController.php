<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Exports\BukuExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function index()
    {
        $books = Buku::all(); //select * from bukus

        return view('home', compact('books'));
    }
    public function AllBuku(Request $request)
    {

        $allBooks = Buku::all();
        if (request('search')) {
            $allBooks = Buku::where('judul', 'like', '%' . request('search') . '%')->get();
        }
        return view('buku.buku', compact('allBooks'));
    }
    public function detailBuku(string $slug)
    {
        $book = Buku::where('slug', $slug)->first();
        return view('buku.detailBuku', compact('book'));
    }
    public function search(Request $request)
    {
        $query = $request->input('search');

        // Lakukan pencarian sesuai dengan query dan dapatkan hasilnya
        $buku = Buku::where('judul', 'like', '%' . $query . '%')->get();

        // Kembalikan hasil pencarian dalam bentuk JSON
        return response()->json(['buku' => $buku]);
    }


    public function export()
    {
        return Excel::download(new BukuExport, 'buku.xlsx');
    }
}
