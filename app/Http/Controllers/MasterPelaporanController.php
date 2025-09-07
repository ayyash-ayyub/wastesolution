<?php

namespace App\Http\Controllers;

use App\Models\MasterPelaporan;
use Illuminate\Http\Request;

class MasterPelaporanController extends Controller
{
    private array $statuses = ['sudah dilaporkan', 'belum dilaporkan'];

    public function index(Request $request)
    {
        $query = MasterPelaporan::query();

        $filterMulai = $request->query('filter_mulai');
        $filterSelesai = $request->query('filter_selesai');

        if ($filterMulai) {
            $query->whereDate('periode_mulai', '>=', $filterMulai);
        }
        if ($filterSelesai) {
            $query->whereDate('periode_selesai', '<=', $filterSelesai);
        }

        $items = $query->orderByDesc('id')->get();
        $statuses = $this->statuses;
        return view('pelaporan.index', compact('items', 'statuses', 'filterMulai', 'filterSelesai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_laporan' => 'required|string',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'status' => 'nullable|string|in:' . implode(',', $this->statuses),
            'lampiran_dokumen' => 'nullable|string|url',
            'keterangan' => 'nullable|string',
        ]);

        $validated['status'] = $validated['status'] ?? 'belum dilaporkan';

        MasterPelaporan::create($validated);
        return redirect()->route('master-pelaporan.index')->with('status', 'Data pelaporan berhasil disimpan');
    }

    public function edit(MasterPelaporan $master_pelaporan)
    {
        $items = MasterPelaporan::orderByDesc('id')->get();
        $editItem = $master_pelaporan;
        $statuses = $this->statuses;
        return view('pelaporan.index', compact('items', 'editItem', 'statuses'));
    }

    public function update(Request $request, MasterPelaporan $master_pelaporan)
    {
        $validated = $request->validate([
            'nama_laporan' => 'required|string',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'status' => 'nullable|string|in:' . implode(',', $this->statuses),
            'lampiran_dokumen' => 'nullable|string|url',
            'keterangan' => 'nullable|string',
        ]);

        $validated['status'] = $validated['status'] ?? 'belum dilaporkan';

        $master_pelaporan->update($validated);
        return redirect()->route('master-pelaporan.index')->with('status', 'Data pelaporan berhasil diperbarui');
    }

    public function destroy(MasterPelaporan $master_pelaporan)
    {
        $master_pelaporan->delete();
        return redirect()->route('master-pelaporan.index')->with('status', 'Data pelaporan berhasil dihapus');
    }
}
