<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('level', 'petugas')->latest();
        if (request()->has('searchPetugas')) {
            $petugas->where('name', 'like', '%' . request('searchPetugas') . '%');
        }
        return view('dashboard.petugas.index', ['petugas' => $petugas->paginate(5)]);
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
        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'level' => 'required',
        ]);

        User::create($validate);

        if (!$validate) {
            return redirect()->back()->withErrors(['error' => 'Data Gagal Ditambahkan']);
        }
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::find($id);
        $petugas->name = $request->name;
        $petugas->username = $request->username;
        $petugas->email = $request->email;
        $petugas->level = $request->level;
        $petugas->save();
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::find($id);
        $petugas->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
