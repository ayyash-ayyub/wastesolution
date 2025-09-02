@extends('layouts.admin')

@section('title', 'Master Lokasi')
@section('page_title', 'Master Lokasi')

@section('content')
<div class="row">
    <div class="col-md-5">
        @include('lokasi._form')
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Data Master Lokasi</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th style="width: 60px">ID</th>
                            <th>Nama Site</th>
                            <th>Kordinat</th>
                            <th style="width: 120px" class="text-right">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_site }}</td>
                                <td>{{ $item->kordinat ?? '-' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('master-lokasi.edit', $item) }}" class="text-warning mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('master-lokasi.destroy', $item) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center p-3">Belum ada data</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Map card -->
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title mb-0">Peta Lokasi</h3>
            </div>
            <div class="card-body" style="height: 420px;">
                <div id="lokasiMap" style="height: 100%; width: 100%; border-radius: 4px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const mapEl = document.getElementById('lokasiMap');
        if (!mapEl) return;

        const map = L.map('lokasiMap');
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        const items = @json($items);
        const bounds = [];
        (items || []).forEach(it => {
            const coordStr = (it.kordinat || '').trim();
            if (!coordStr) return;
            // Expected format: "lat,lon" (e.g., -6.2,106.8)
            const parts = coordStr.split(',').map(s => s.trim());
            if (parts.length !== 2) return;
            const lat = parseFloat(parts[0]);
            const lon = parseFloat(parts[1]);
            if (!isFinite(lat) || !isFinite(lon)) return;
            const marker = L.marker([lat, lon]).addTo(map);
            marker.bindPopup(`<strong>${it.nama_site || 'Lokasi'}</strong><br/>${coordStr}`);
            bounds.push([lat, lon]);
        });

        if (bounds.length) {
            map.fitBounds(bounds, { padding: [20, 20] });
        } else {
            map.setView([-2.5489, 118.0149], 5); // Center over Indonesia as a neutral default
        }
    });
</script>
@endpush
