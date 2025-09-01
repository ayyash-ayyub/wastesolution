<?php

namespace App\Http\Controllers;

use App\Models\DataLimbah;
use App\Models\MasterLimbah;
use App\Models\MasterLokasi;
use Illuminate\Http\Request;

class DataLimbahController extends Controller
{
    private function kategoriOptions()
    {
        return MasterLimbah::query()
            ->select('nama_kategori')
            ->distinct()
            ->orderBy('nama_kategori')
            ->pluck('nama_kategori')
            ->toArray();
    }

    private function subKategoriMap()
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

    private function metodeMap()
    {
        // category => [[id, nama_metode]]
        $rows = \App\Models\MasterMetode::query()
            ->select('id', 'kategori_sampah', 'nama_metode')
            ->whereNotNull('nama_metode')
            ->orderBy('kategori_sampah')
            ->orderBy('nama_metode')
            ->get();
        $map = [];
        foreach ($rows as $r) {
            $map[$r->kategori_sampah] = $map[$r->kategori_sampah] ?? [];
            $map[$r->kategori_sampah][] = ['id' => $r->id, 'nama' => $r->nama_metode];
        }
        return $map;
    }

    public function index()
    {
        $items = DataLimbah::with(['masterMetode','masterLokasi'])->orderByDesc('id')->get();
        $kategoriOptions = $this->kategoriOptions();
        $subKategoriMap = $this->subKategoriMap();
        $metodeMap = $this->metodeMap();
        $lokasiOptions = MasterLokasi::orderBy('nama_site')->get(['id','nama_site']);
        return view('datalimbah.index', compact('items', 'kategoriOptions', 'subKategoriMap', 'metodeMap', 'lokasiOptions'));
    }

    public function store(Request $request)
    {
        $kategoriOptions = $this->kategoriOptions();

        $validated = $request->validate([
            'nama_limbah' => 'required|string',
            'kategori_limbah' => 'required|string|in:' . implode(',', array_map(fn($v) => str_replace(',', '\\,', $v), $kategoriOptions)),
            'sub_kategori_limbah' => 'nullable|string',
            'master_metode_id' => 'nullable|integer',
            'master_lokasi_id' => 'required|integer',
            'tonasi' => 'required|numeric|min:0',
            'lokasi' => 'nullable|string',
        ]);

        // If kategori has no subcategories, nullify
        $map = $this->subKategoriMap();
        if (!isset($map[$validated['kategori_limbah']]) || empty($map[$validated['kategori_limbah']])) {
            $validated['sub_kategori_limbah'] = null;
        }

        // Validate master_metode_id belongs to selected category; derive text name into 'metode'
        $mMap = $this->metodeMap();
        if (!empty($mMap[$validated['kategori_limbah']])) {
            $ids = array_column($mMap[$validated['kategori_limbah']], 'id');
            $request->validate([
                'master_metode_id' => 'required|in:' . implode(',', $ids),
            ]);
            $chosen = collect($mMap[$validated['kategori_limbah']])->firstWhere('id', (int) $request->input('master_metode_id'));
            $validated['metode'] = $chosen['nama'] ?? null;
        } else {
            $validated['master_metode_id'] = null;
            $validated['metode'] = null;
        }

        // Validate lokasi relation and set lokasi text
        $lokasiIds = MasterLokasi::pluck('id')->toArray();
        $request->validate([
            'master_lokasi_id' => 'required|in:' . implode(',', $lokasiIds),
        ]);
        $lok = MasterLokasi::find($request->input('master_lokasi_id'));
        $validated['lokasi'] = $lok?->nama_site;

        DataLimbah::create($validated);
        return redirect()->route('data-limbah.index')->with('status', 'Data limbah berhasil disimpan');
    }

    public function edit(DataLimbah $data_limbah)
    {
        $items = DataLimbah::with(['masterMetode','masterLokasi'])->orderByDesc('id')->get();
        $kategoriOptions = $this->kategoriOptions();
        $subKategoriMap = $this->subKategoriMap();
        $metodeMap = $this->metodeMap();
        $lokasiOptions = MasterLokasi::orderBy('nama_site')->get(['id','nama_site']);
        $editItem = $data_limbah;
        return view('datalimbah.index', compact('items', 'kategoriOptions', 'subKategoriMap', 'metodeMap', 'lokasiOptions', 'editItem'));
    }

    public function update(Request $request, DataLimbah $data_limbah)
    {
        $kategoriOptions = $this->kategoriOptions();

        $validated = $request->validate([
            'nama_limbah' => 'required|string',
            'kategori_limbah' => 'required|string|in:' . implode(',', array_map(fn($v) => str_replace(',', '\\,', $v), $kategoriOptions)),
            'sub_kategori_limbah' => 'nullable|string',
            'master_metode_id' => 'nullable|integer',
            'master_lokasi_id' => 'required|integer',
            'tonasi' => 'required|numeric|min:0',
            'lokasi' => 'nullable|string',
        ]);

        $map = $this->subKategoriMap();
        if (!isset($map[$validated['kategori_limbah']]) || empty($map[$validated['kategori_limbah']])) {
            $validated['sub_kategori_limbah'] = null;
        }

        // metode validation per category
        $mMap = $this->metodeMap();
        if (!empty($mMap[$validated['kategori_limbah']])) {
            $ids = array_column($mMap[$validated['kategori_limbah']], 'id');
            $request->validate([
                'master_metode_id' => 'required|in:' . implode(',', $ids),
            ]);
            $chosen = collect($mMap[$validated['kategori_limbah']])->firstWhere('id', (int) $request->input('master_metode_id'));
            $validated['metode'] = $chosen['nama'] ?? null;
        } else {
            $validated['master_metode_id'] = null;
            $validated['metode'] = null;
        }

        // Lokasi relation and set lokasi text
        $lokasiIds = MasterLokasi::pluck('id')->toArray();
        $request->validate([
            'master_lokasi_id' => 'required|in:' . implode(',', $lokasiIds),
        ]);
        $lok = MasterLokasi::find($request->input('master_lokasi_id'));
        $validated['lokasi'] = $lok?->nama_site;

        $data_limbah->update($validated);
        return redirect()->route('data-limbah.index')->with('status', 'Data limbah berhasil diperbarui');
    }

    public function destroy(DataLimbah $data_limbah)
    {
        $data_limbah->delete();
        return redirect()->route('data-limbah.index')->with('status', 'Data limbah berhasil dihapus');
    }
}
