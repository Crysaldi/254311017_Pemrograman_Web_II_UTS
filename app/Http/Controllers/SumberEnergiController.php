<?php

namespace App\Http\Controllers;

use App\Models\SumberEnergi;
use Illuminate\Http\Request;

class SumberEnergiController extends Controller
{
    public function index()
    {
        $sumberEnergi = SumberEnergi::latest()->get();

        return view('sumber_energi.index', compact('sumberEnergi'));
    }

    public function create()
    {
        return view('sumber_energi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_energi' => 'required|string|max:255',
            'jenis_energi' => 'required|string|max:255',
            'kapasitas' => 'required|numeric|min:0',
            'lokasi' => 'required|string|max:255',
            'status_aktif' => 'required|boolean',
        ]);

        SumberEnergi::create($validated);

        return redirect()->route('sumber-energi.index')
            ->with('success', 'Data sumber energi berhasil ditambahkan.');
    }

    public function show(SumberEnergi $sumberEnergi)
    {
        return redirect()->route('sumber-energi.index');
    }

    public function edit(SumberEnergi $sumberEnergi)
    {
        return view('sumber_energi.edit', compact('sumberEnergi'));
    }

    public function update(Request $request, SumberEnergi $sumberEnergi)
    {
        $validated = $request->validate([
            'nama_energi' => 'required|string|max:255',
            'jenis_energi' => 'required|string|max:255',
            'kapasitas' => 'required|numeric|min:0',
            'lokasi' => 'required|string|max:255',
            'status_aktif' => 'required|boolean',
        ]);

        $sumberEnergi->update($validated);

        return redirect()->route('sumber-energi.index')
            ->with('success', 'Data sumber energi berhasil diperbarui.');
    }

    public function destroy(SumberEnergi $sumberEnergi)
    {
        $sumberEnergi->delete();

        return redirect()->route('sumber-energi.index')
            ->with('success', 'Data sumber energi berhasil dihapus.');
    }
}
