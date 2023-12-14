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
        $anggota = Anggota::latest();
        if (request()->has('searchAnggota')) {
            $anggota->where('nama', 'like', '%' . request('searchAnggota') . '%');
        }
        return view('dashboard.anggota', ['anggota' => $anggota->paginate(5)]);
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
            'kode_anggota' => 'required|unique:anggotas,kode_anggota',
            'nama' => 'required|unique:anggotas,nama',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
        ]);

        $dataAnggota = $request->all();

        foreach ($dataAnggota['kode_anggota'] as $key => $value) {
            $newName = '';

            if ($request->hasFile('foto') && $request->file('foto')[$key]) {
                $extension = $request->file('foto')[$key]->getClientOriginalExtension();
                $newName = $request->nama[$key] . '-' . now()->timestamp . '.' . $extension;
                $request->file('foto')[$key]->storeAs('anggota', $newName);
            }

            Anggota::create([
                'kode_anggota' => $value,
                'nama' => $dataAnggota['nama'][$key],
                'jenis_kelamin' => $dataAnggota['jenis_kelamin'][$key],
                'tempat_lahir' => $dataAnggota['tempat_lahir'][$key],
                'tanggal_lahir' => $dataAnggota['tanggal_lahir'][$key],
                'telpon' => $dataAnggota['telpon'][$key],
                'alamat' => $dataAnggota['alamat'][$key],
                'foto' => $newName,
            ]);
        }

        if (!$validate) {
            return redirect()->back()->withErrors(['error' => 'Data Gagal Ditambahkan']);
        }

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
