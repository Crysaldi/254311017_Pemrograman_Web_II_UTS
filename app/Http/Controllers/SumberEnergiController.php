<?php

namespace App\Http\Controllers;

use App\Models\SumberEnergi;
use Illuminate\Http\Request;

class SumberEnergiController extends Controller
{
    public function index(Request $request)
    {
        $query = SumberEnergi::latest();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_energi', 'like', "%{$search}%")
                  ->orWhere('jenis_energi', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        $limit = $request->get('limit', 10);
        $sumberEnergis = $query->paginate($limit);

        return response()->json([
            'success' => true,
            'message' => 'Data sumber energi berhasil dimuat.',
            'data'    => $sumberEnergis->items(),
            'meta'    => [
                'current_page' => $sumberEnergis->currentPage(),
                'last_page'    => $sumberEnergis->lastPage(),
                'per_page'     => $sumberEnergis->perPage(),
                'total_items'  => $sumberEnergis->total(),
                'total_pages'  => $sumberEnergis->lastPage(),
            ],
        ]);
    }

    public function show($id)
    {
        $sumberEnergi = SumberEnergi::findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $sumberEnergi,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_energi'  => 'required|string|max:255',
            'jenis_energi' => 'required|string|max:255',
            'kapasitas'    => 'required|numeric|min:0',
            'lokasi'       => 'required|string|max:255',
            'status_aktif' => 'required',
        ]);

        $validated['status_aktif'] = filter_var($validated['status_aktif'], FILTER_VALIDATE_BOOLEAN);

        $sumberEnergi = SumberEnergi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Informasi energi berhasil ditambahkan.',
            'data'    => $sumberEnergi,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $sumberEnergi = SumberEnergi::findOrFail($id);

        $validated = $request->validate([
            'nama_energi'  => 'required|string|max:255',
            'jenis_energi' => 'required|string|max:255',
            'kapasitas'    => 'required|numeric|min:0',
            'lokasi'       => 'required|string|max:255',
            'status_aktif' => 'required',
        ]);

        $validated['status_aktif'] = filter_var($validated['status_aktif'], FILTER_VALIDATE_BOOLEAN);

        $sumberEnergi->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Informasi energi berhasil diperbarui.',
            'data'    => $sumberEnergi,
        ]);
    }

    public function destroy($id)
    {
        $sumberEnergi = SumberEnergi::findOrFail($id);
        $sumberEnergi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Informasi energi berhasil dihapus.',
        ]);
    }
}