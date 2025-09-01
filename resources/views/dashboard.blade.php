@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                Selamat datang, <strong>{{ auth()->user()->name }}</strong>!
            </div>
        </div>
    </div>

    <!-- Summary cards -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 text-primary" style="font-size:28px;"><i class="fas fa-recycle"></i></div>
                <div>
                    <div class="text-muted">Jumlah Limbah</div>
                    <div class="h4 mb-0">{{ $jumlahLimbah ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 text-success" style="font-size:28px;"><i class="fas fa-tags"></i></div>
                <div>
                    <div class="text-muted">Jumlah Kategori Limbah</div>
                    <div class="h4 mb-0">{{ $jumlahKategoriLimbah ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-balance-scale mr-2"></i>Tonase per Kategori Limbah</h3>
            </div>
            <div class="card-body">
                <canvas id="chartTonaseKategori" height="140"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-layer-group mr-2"></i>Tonase per Sub Kategori Limbah</h3>
            </div>
            <div class="card-body">
                <canvas id="chartTonaseSubKategori" height="140"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-map-marker-alt mr-2"></i>Tonase per Lokasi</h3>
            </div>
            <div class="card-body">
                <canvas id="chartTonaseLokasi" height="160"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mb-0"><i class="fas fa-industry mr-2"></i>Metode Pengolahan per Kategori & Sub Kategori</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Sub Kategori</th>
                                <th>Metode</th>
                                <th class="text-right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($metodePerKategoriSub ?? []) as $row)
                                <tr>
                                    <td>{{ $row->kategori_limbah ?? '-' }}</td>
                                    <td>{{ $row->sub_kategori_limbah ?? '-' }}</td>
                                    <td>{{ $row->metode ?? '-' }}</td>
                                    <td class="text-right">{{ $row->total }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted p-3">Belum ada data</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    (function(){
        const kategoriData = @json($tonasePerKategori ?? []);
        const subKategoriData = @json($tonasePerSubKategori ?? []);
        const lokasiData = @json($tonasePerLokasi ?? []);

        const labelsKat = kategoriData.map(r => r.kategori_limbah || '-');
        const dataKat = kategoriData.map(r => parseFloat(r.total || 0));

        const labelsSub = subKategoriData.map(r => r.sub_kategori_limbah || '-');
        const dataSub = subKategoriData.map(r => parseFloat(r.total || 0));

        const labelsLok = lokasiData.map(r => r.lokasi || '-');
        const dataLok = lokasiData.map(r => parseFloat(r.total || 0));

        const palette = ['#3b82f6','#10b981','#f59e0b','#ef4444','#8b5cf6','#14b8a6','#f43f5e','#84cc16','#eab308','#06b6d4'];

        function makePieChart(ctxId, labels, data){
            const ctx = document.getElementById(ctxId);
            if (!ctx) return;
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Tonase',
                        data: data,
                        backgroundColor: labels.map((_,i)=> palette[i % palette.length])
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: true, position: 'bottom' },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `${ctx.label}: ${ctx.formattedValue}`
                            }
                        }
                    }
                }
            });
        }

        function makeBarChart(ctxId, labels, data){
            const ctx = document.getElementById(ctxId);
            if (!ctx) return;
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Tonase',
                        data: data,
                        backgroundColor: labels.map((_,i)=> palette[i % palette.length])
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { ticks: { autoSkip: true, maxRotation: 45, minRotation: 0 } },
                        y: { beginAtZero: true }
                    }
                }
            });
        }

        makePieChart('chartTonaseKategori', labelsKat, dataKat);
        makeBarChart('chartTonaseSubKategori', labelsSub, dataSub);
        makePieChart('chartTonaseLokasi', labelsLok, dataLok);
    })();
</script>
@endsection
