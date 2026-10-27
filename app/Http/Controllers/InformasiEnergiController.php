<?php

namespace App\Http\Controllers;

use App\Models\SumberEnergi;

class InformasiEnergiController extends Controller
{
    public function index()
    {
        $sumberEnergis = SumberEnergi::orderBy('nama_energi')
            ->paginate(9);

        return view('informasi_energi.index', compact('sumberEnergis'));
    }
}
