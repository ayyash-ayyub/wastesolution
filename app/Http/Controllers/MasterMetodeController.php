<?php

namespace App\Http\Controllers;

use App\Models\MasterMetode;
use Illuminate\Http\Request;

class MasterMetodeController extends Controller
{
    private array $kategori = ['Non B3', 'B3', 'Ipal'];
    private array $subB3 = ['insenerasi', 'solidifikasi', 'destruksi termal', 'bioremediasi', 'adsorpsi', 'stabilisasi'];
    private array $subNonB3 = ['recycle', 'magot', 'kompos', 'waste to energy'];

    public function index()
    {
        $items = MasterMetode::orderByDesc('id')->get();
        $kategori = $this->kategori;
        $methodOptions = [
            'B3' => $this->subB3,
            'Non B3' => $this->subNonB3,
            'Ipal' => [],
        ];
        return view('metode.index', compact('items', 'kategori', 'methodOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_sampah' => 'required|in:' . implode(',', $this->kategori),
            'nama_metode' => 'nullable|string',
        ]);

        // If kategori requires sub_kategori, validate options; if Ipal, nullify
        if ($validated['kategori_sampah'] === 'B3') {
            $request->validate(['nama_metode' => 'required|in:' . implode(',', $this->subB3)]);
        } elseif ($validated['kategori_sampah'] === 'Non B3') {
            $request->validate(['nama_metode' => 'required|in:' . implode(',', $this->subNonB3)]);
        } else { // Ipal
            $validated['nama_metode'] = null;
        }

        MasterMetode::create($validated);
        return redirect()->route('master-metode.index')->with('status', 'Data metode berhasil disimpan');
    }

    public function edit(MasterMetode $master_metode)
    {
        $items = MasterMetode::orderByDesc('id')->get();
        $kategori = $this->kategori;
        $methodOptions = [
            'B3' => $this->subB3,
            'Non B3' => $this->subNonB3,
            'Ipal' => [],
        ];
        $editItem = $master_metode;
        return view('metode.index', compact('items', 'kategori', 'methodOptions', 'editItem'));
    }

    public function update(Request $request, MasterMetode $master_metode)
    {
        $validated = $request->validate([
            'kategori_sampah' => 'required|in:' . implode(',', $this->kategori),
            'nama_metode' => 'nullable|string',
        ]);

        if ($validated['kategori_sampah'] === 'B3') {
            $request->validate(['nama_metode' => 'required|in:' . implode(',', $this->subB3)]);
        } elseif ($validated['kategori_sampah'] === 'Non B3') {
            $request->validate(['nama_metode' => 'required|in:' . implode(',', $this->subNonB3)]);
        } else { // Ipal
            $validated['nama_metode'] = null;
        }

        $master_metode->update($validated);
        return redirect()->route('master-metode.index')->with('status', 'Data metode berhasil diperbarui');
    }

    public function destroy(MasterMetode $master_metode)
    {
        $master_metode->delete();
        return redirect()->route('master-metode.index')->with('status', 'Data metode berhasil dihapus');
    }
}
