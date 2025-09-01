<?php

namespace App\Http\Controllers;

use App\Models\MasterLimbah;
use Illuminate\Http\Request;

class MasterLimbahController extends Controller
{
    public function index()
    {
        $items = MasterLimbah::orderByDesc('id')->get();
        return view('limbah.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|in:Non B3,B3,Ipal',
            'nama_subkategori' => 'nullable|string',
        ]);

        // If kategori is Ipal, ignore subkategori
        if (($validated['nama_kategori'] ?? null) === 'Ipal') {
            $validated['nama_subkategori'] = null;
        }

        MasterLimbah::create($validated);
        return redirect()->route('master-limbah.index')->with('status', 'Data berhasil disimpan');
    }

    public function edit(MasterLimbah $master_limbah)
    {
        $items = MasterLimbah::orderByDesc('id')->get();
        $editItem = $master_limbah;
        return view('limbah.index', compact('items', 'editItem'));
    }

    public function update(Request $request, MasterLimbah $master_limbah)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|in:Non B3,B3,Ipal',
            'nama_subkategori' => 'nullable|string',
        ]);

        if (($validated['nama_kategori'] ?? null) === 'Ipal') {
            $validated['nama_subkategori'] = null;
        }

        $master_limbah->update($validated);
        return redirect()->route('master-limbah.index')->with('status', 'Data berhasil diperbarui');
    }

    public function destroy(MasterLimbah $master_limbah)
    {
        $master_limbah->delete();
        return redirect()->route('master-limbah.index')->with('status', 'Data berhasil dihapus');
    }
}

