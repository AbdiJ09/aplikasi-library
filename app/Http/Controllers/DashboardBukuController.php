<?php

namespace App\Http\Controllers;

use App\Imports\BukuImport;
use App\Models\Buku;
use App\Models\Kategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class DashboardBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Buku::latest();
        $jumlahStok = Buku::sum('jumlah_stok');
        $kategories = Kategory::all();
        if (request()->has('searchBuku')) {
            $books->where('judul', 'like', '%' . request('searchBuku') . '%');
        }
        return view('dashboard.buku.buku', ['books' => $books->paginate(5)], compact('kategories', 'jumlahStok'));
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
        $conss = $request->validate([
            'kode_buku' => 'required|unique:bukus,kode_buku',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'jumlah_stok' => 'required',
            'gambar' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);
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
            'gambar' => $newName,
            'deskripsi_buku' => $request->deskripsi_buku,
        ]);
        if (!$conss) {
            return redirect('/dashboard/buku')->withErrors(['error' => 'Data Gagal Ditambahkan']);
        }
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
        $rules = [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'jumlah_stok' => 'required',
            'gambar' => 'file|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_buku' => 'required',
        ];
        $validate = $request->validate($rules);
        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete('buku/' . $request->oldImage);
            }
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->judul . '-' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('buku', $newName);
            $validate['gambar'] = $newName;
        }
        Buku::where('id', $id)->update($validate);
        return redirect()->back()->with('success', 'Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Buku Berhasil Dihapus');
    }
    public function import()
    {
        Excel::import(new BukuImport, request()->file('file'));
        return redirect()->back();
    }
}
