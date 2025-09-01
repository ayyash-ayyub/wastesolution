<?php

namespace App\Http\Controllers;

use App\Models\MasterInventarisasi;
use App\Models\MasterLimbah;
use App\Models\DataLimbah;
use Illuminate\Http\Request;

class MasterInventarisasiController extends Controller
{
    private array $ujiOptions = ['Air', 'Udara', 'Tanah'];
    private array $kategoriFixed = ['B3', 'Non B3'];

    private function kategoriOptions(): array
    {
        // Fixed options per requirement
        return $this->kategoriFixed;
    }

    private function subKategoriMap(): array
    {
        $rows = MasterLimbah::query()
            ->select('nama_kategori', 'nama_subkategori')
            ->whereNotNull('nama_subkategori')
            ->orderBy('nama_kategori')
            ->orderBy('nama_subkategori')
            ->get();
        $map = [];
        foreach ($rows as $r) {
            $map[$r->nama_kategori] = $map[$r->nama_kategori] ?? [];
            if (!in_array($r->nama_subkategori, $map[$r->nama_kategori])) {
                $map[$r->nama_kategori][] = $r->nama_subkategori;
            }
        }
        return $map;
    }

    private function tonaseBySubKategori(): array
    {
        return DataLimbah::query()
            ->selectRaw('COALESCE(sub_kategori_limbah, "__NULL__") as sub_kategori, SUM(tonasi) as total')
            ->groupBy('sub_kategori')
            ->pluck('total', 'sub_kategori')
            ->toArray();
    }

    public function index()
    {
        $items = MasterInventarisasi::orderByDesc('id')->get();
        $ujiOptions = $this->ujiOptions;
        $kategoriOptions = $this->kategoriOptions();
        $subKategoriMap = $this->subKategoriMap();
        $tonaseMap = $this->tonaseBySubKategori();
        return view('inventarisasi.index', compact('items', 'ujiOptions', 'kategoriOptions', 'subKategoriMap', 'tonaseMap'));
    }

    public function store(Request $request)
    {
        $kategoriOptions = $this->kategoriOptions();
        $subKategoriMap = $this->subKategoriMap();
        $tonaseMap = $this->tonaseBySubKategori();

        $validated = $request->validate([
            'kategori' => 'required|in:' . implode(',', $kategoriOptions),
            'sub_kategori' => 'nullable|string',
            'uji_kualitas' => 'required|in:' . implode(',', $this->ujiOptions),
        ]);

        // Validate sub_kategori in map if available for selected kategori
        $lookupKategori = $validated['kategori'];
        if (!empty($subKategoriMap[$lookupKategori])) {
            $request->validate([
                'sub_kategori' => 'required|in:' . implode(',', array_map(fn($v) => str_replace(',', '\\,', $v), $subKategoriMap[$lookupKategori])),
            ]);
        } else {
            $validated['sub_kategori'] = null; // for categories without subcategories
        }

        // Compute tonase from DataLimbah sum by sub_kategori
        $key = $validated['sub_kategori'] ?? '__NULL__';
        $tonase = (float) ($tonaseMap[$key] ?? 0);
        $validated['tonase'] = $tonase;

        MasterInventarisasi::create($validated);
        return redirect()->route('master-inventarisasi.index')->with('status', 'Data inventarisasi berhasil disimpan');
    }

    public function edit(MasterInventarisasi $master_inventarisasi)
    {
        $items = MasterInventarisasi::orderByDesc('id')->get();
        $editItem = $master_inventarisasi;
        $ujiOptions = $this->ujiOptions;
        $kategoriOptions = $this->kategoriOptions();
        $subKategoriMap = $this->subKategoriMap();
        $tonaseMap = $this->tonaseBySubKategori();
        return view('inventarisasi.index', compact('items', 'editItem', 'ujiOptions', 'kategoriOptions', 'subKategoriMap', 'tonaseMap'));
    }

    public function update(Request $request, MasterInventarisasi $master_inventarisasi)
    {
        $kategoriOptions = $this->kategoriOptions();
        $subKategoriMap = $this->subKategoriMap();
        $tonaseMap = $this->tonaseBySubKategori();

        $validated = $request->validate([
            'kategori' => 'required|in:' . implode(',', $kategoriOptions),
            'sub_kategori' => 'nullable|string',
            'uji_kualitas' => 'required|in:' . implode(',', $this->ujiOptions),
        ]);

        $lookupKategori = $validated['kategori'];
        if (!empty($subKategoriMap[$lookupKategori])) {
            $request->validate([
                'sub_kategori' => 'required|in:' . implode(',', array_map(fn($v) => str_replace(',', '\\,', $v), $subKategoriMap[$lookupKategori])),
            ]);
        } else {
            $validated['sub_kategori'] = null;
        }

        $key = $validated['sub_kategori'] ?? '__NULL__';
        $tonase = (float) ($tonaseMap[$key] ?? 0);
        $validated['tonase'] = $tonase;

        $master_inventarisasi->update($validated);
        return redirect()->route('master-inventarisasi.index')->with('status', 'Data inventarisasi berhasil diperbarui');
    }

    public function destroy(MasterInventarisasi $master_inventarisasi)
    {
        $master_inventarisasi->delete();
        return redirect()->route('master-inventarisasi.index')->with('status', 'Data inventarisasi berhasil dihapus');
    }
}
