<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
{
    public function export()
    {
        return Excel::download(new AnggotaExport, 'anggota.xlsx');
    }
}
