<?php

namespace App\Http\Controllers;

use App\Models\MasterKajian;
use Illuminate\Http\Request;

class MasterKajianController extends Controller
{
    public function index()
    {
        $items = MasterKajian::orderByDesc('id')->get();
        return view('kajian.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'resume' => 'required|string',
            'link_dokumen' => 'required|string',
        ]);

        MasterKajian::create($validated);
        return redirect()->route('master-kajian.index')->with('status', 'Kajian berhasil disimpan');
    }

    public function edit(MasterKajian $master_kajian)
    {
        $items = MasterKajian::orderByDesc('id')->get();
        $editItem = $master_kajian;
        return view('kajian.index', compact('items', 'editItem'));
    }

    public function update(Request $request, MasterKajian $master_kajian)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'resume' => 'required|string',
            'link_dokumen' => 'required|string',
        ]);

        $master_kajian->update($validated);
        return redirect()->route('master-kajian.index')->with('status', 'Kajian berhasil diperbarui');
    }

    public function destroy(MasterKajian $master_kajian)
    {
        $master_kajian->delete();
        return redirect()->route('master-kajian.index')->with('status', 'Kajian berhasil dihapus');
    }
}
