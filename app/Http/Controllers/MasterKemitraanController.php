<?php

namespace App\Http\Controllers;

use App\Models\MasterKemitraan;
use Illuminate\Http\Request;

class MasterKemitraanController extends Controller
{
    private array $jenisOptions = ['Komunitas', 'Perusahaan', 'Pemerintah', 'Akademisi', 'Lainnya'];

    public function index()
    {
        $items = MasterKemitraan::orderByDesc('id')->get();
        $jenisOptions = $this->jenisOptions;
        return view('kemitraan.index', compact('items', 'jenisOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mitra' => 'required|string',
            'jenis' => 'required|in:' . implode(',', $this->jenisOptions),
            'nama_kegiatan' => 'required|string',
            'sasaran' => 'required|string',
            'jumlah_penerima_manfaat' => 'required|integer|min:0',
        ]);

        MasterKemitraan::create($validated);
        return redirect()->route('master-kemitraan.index')->with('status', 'Data kemitraan berhasil disimpan');
    }

    public function edit(MasterKemitraan $master_kemitraan)
    {
        $items = MasterKemitraan::orderByDesc('id')->get();
        $editItem = $master_kemitraan;
        $jenisOptions = $this->jenisOptions;
        return view('kemitraan.index', compact('items', 'editItem', 'jenisOptions'));
    }

    public function update(Request $request, MasterKemitraan $master_kemitraan)
    {
        $validated = $request->validate([
            'nama_mitra' => 'required|string',
            'jenis' => 'required|in:' . implode(',', $this->jenisOptions),
            'nama_kegiatan' => 'required|string',
            'sasaran' => 'required|string',
            'jumlah_penerima_manfaat' => 'required|integer|min:0',
        ]);

        $master_kemitraan->update($validated);
        return redirect()->route('master-kemitraan.index')->with('status', 'Data kemitraan berhasil diperbarui');
    }

    public function show(MasterKemitraan $master_kemitraan)
    {
        return view('kemitraan.show', ['item' => $master_kemitraan]);
    }

    public function destroy(MasterKemitraan $master_kemitraan)
    {
        $master_kemitraan->delete();
        return redirect()->route('master-kemitraan.index')->with('status', 'Data kemitraan berhasil dihapus');
    }
}
