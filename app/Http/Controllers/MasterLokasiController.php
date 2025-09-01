<?php

namespace App\Http\Controllers;

use App\Models\MasterLokasi;
use Illuminate\Http\Request;

class MasterLokasiController extends Controller
{
    public function index()
    {
        $items = MasterLokasi::orderByDesc('id')->get();
        return view('lokasi.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_site' => 'required|string',
            'kordinat' => 'nullable|string',
        ]);

        MasterLokasi::create($validated);
        return redirect()->route('master-lokasi.index')->with('status', 'Lokasi berhasil disimpan');
    }

    public function edit(MasterLokasi $master_lokasi)
    {
        $items = MasterLokasi::orderByDesc('id')->get();
        $editItem = $master_lokasi;
        return view('lokasi.index', compact('items', 'editItem'));
    }

    public function update(Request $request, MasterLokasi $master_lokasi)
    {
        $validated = $request->validate([
            'nama_site' => 'required|string',
            'kordinat' => 'nullable|string',
        ]);

        $master_lokasi->update($validated);
        return redirect()->route('master-lokasi.index')->with('status', 'Lokasi berhasil diperbarui');
    }

    public function destroy(MasterLokasi $master_lokasi)
    {
        $master_lokasi->delete();
        return redirect()->route('master-lokasi.index')->with('status', 'Lokasi berhasil dihapus');
    }
}

