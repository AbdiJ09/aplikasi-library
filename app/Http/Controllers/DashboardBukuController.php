<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Buku::all();
        $jumlahStok = Buku::sum('jumlah_stok');
        $kategories = Kategory::all();
        return view('dashboard.buku.buku', compact('books', 'kategories', 'jumlahStok'));
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
        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->pengarang . '-' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('buku', $newName);
        }

        $slug = Str::slug($request->judul);

        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'kategory_id' => $request->kategory_id,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_stok' => $request->jumlah_stok,
            'isbn' => $request->isbn,
            'slug' => $slug,
            'gambar' => $newName
        ]);
        return redirect('/dashboard/buku')->with('success', 'Buku Berhasil Ditambahkan');
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
