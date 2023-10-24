<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Exports\AnggotaExport;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class DashboardAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('admin');
        $anggota = Anggota::all();
        return view('dashboard.anggota', compact('anggota'));
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
        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('anggota', $newName);
        }
        Anggota::create([
            'kode_anggota' => $request->kode_anggota,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $newName,

        ]);
        return redirect('/dashboard/anggota')->with('success', 'Anggota Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'kode_anggota' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'foto' => 'file|mimes:jpeg,png,jpg|max:2048',
        ];
        $validate = $request->validate($rules);
        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete('anggota/' . $request->oldFoto);
            }
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('anggota', $newName);
            $validate['foto'] = $newName;
        }
        Anggota::where('id', $id)->update($validate);
        return redirect()->back()->with('success', 'Anggota Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Anggota::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Anggota Berhasil Dihapus');
    }
}
