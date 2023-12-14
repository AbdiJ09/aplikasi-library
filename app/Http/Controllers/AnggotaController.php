<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Imports\AnggotaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
{
    public function export()
    {
        return Excel::download(new AnggotaExport, 'anggota.xlsx');
    }
    public function import()
    {
        Excel::import(new AnggotaImport, request()->file('file'));
        return redirect()->back();
    }
}
