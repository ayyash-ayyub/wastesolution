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

    <div class="w-100 d-block d-xl-none"></div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 text-info" style="font-size:28px;"><i class="fas fa-handshake"></i></div>
                <div>
                    <div class="text-muted">Total Kemitraan</div>
                    <div class="h4 mb-0">{{ $totalKemitraan ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 text-warning" style="font-size:28px;"><i class="fas fa-newspaper"></i></div>
                <div>
                    <div class="text-muted">Total Kajian</div>
                    <div class="h4 mb-0">{{ $totalKajian ?? 0 }}</div>
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
                <canvas id="chartTonaseKategori" height="160"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-layer-group mr-2"></i>Tonase per Sub Kategori Limbah — B3</h3>
            </div>
            <div class="card-body">
                <canvas id="chartTonaseSubKategoriB3" height="140"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-layer-group mr-2"></i>Tonase per Sub Kategori Limbah — Non B3</h3>
            </div>
            <div class="card-body">
                <canvas id="chartTonaseSubKategoriNonB3" height="140"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
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
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-industry mr-2"></i>Metode Pengolahan (Jumlah Data B3 vs Non B3)</h3>
            </div>
            <div class="card-body">
                <canvas id="chartMetodeB3NonB3" height="240"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-table mr-2"></i>Jumlah Tonase Berdasarkan Lokasi</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th rowspan="2" class="align-middle text-center" style="min-width:140px;">Lokasi</th>
                                <th colspan="3" class="text-center">Jenis</th>
                                <th colspan="{{ count($methodList ?? []) }}" class="text-center">Metode pengolahan</th>
                            </tr>
                            <tr>
                                <th class="text-center">Organik</th>
                                <th class="text-center">Anorganik</th>
                                <th class="text-center">Residu</th>
                                @foreach(($methodList ?? []) as $m)
                                    <th class="text-center">{{ ucwords($m) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @forelse(($lokasiMatrix ?? []) as $r)
                            @php
                                $fmt = function($v){ return number_format((float)$v, 0, ',', '.'); };
                            @endphp
                            <tr>
                                <td>{{ $r['lokasi'] ?? '-' }}</td>
                                <td class="text-center">{{ $fmt($r['organik'] ?? 0) }}</td>
                                <td class="text-center">{{ $fmt($r['anorganik'] ?? 0) }}</td>
                                <td class="text-center">{{ $fmt($r['residu'] ?? 0) }}</td>
                                @foreach(($methodList ?? []) as $m)
                                    <td class="text-center">{{ $fmt($r[$m] ?? 0) }}</td>
                                @endforeach
                            </tr>
                        @empty
                            <tr><td colspan="{{ 4 + (count($methodList ?? [])) }}" class="text-center text-muted p-3">Belum ada data</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
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
                                @php
                                    $ton = (float) ($row->total ?? 0);
                                    $kg  = $ton * 1000;
                                    $tonFmt = number_format($ton, 1, ',', '.');
                                    $kgFmt  = number_format($kg, 0, ',', '.');
                                @endphp
                                <tr>
                                    <td>{{ $row->kategori_limbah ?? '-' }}</td>
                                    <td>{{ $row->sub_kategori_limbah ?? '-' }}</td>
                                    <td>{{ $row->metode ?? '-' }}</td>
                                    <td class="text-right">{{ $tonFmt }} ton / {{ $kgFmt }} kg</td>
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
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
<script>
    (function(){
        const kategoriData = @json($tonasePerKategori ?? []);
        const subKategoriData = @json($tonasePerSubKategori ?? []);
        const subKategoriB3 = @json($tonaseSubKategoriB3 ?? []);
        const subKategoriNonB3 = @json($tonaseSubKategoriNonB3 ?? []);
        const lokasiData = @json($tonasePerLokasi ?? []);

        const labelsKat = kategoriData.map(r => r.kategori_limbah || '-');
        const dataKat = kategoriData.map(r => parseFloat(r.total || 0));

        const labelsSub = subKategoriData.map(r => r.sub_kategori_limbah || '-');
        const dataSub = subKategoriData.map(r => parseFloat(r.total || 0));

        const labelsSubB3 = subKategoriB3.map(r => r.sub_kategori_limbah || '-');
        const dataSubB3 = subKategoriB3.map(r => parseFloat(r.total || 0));

        const labelsSubNonB3 = subKategoriNonB3.map(r => r.sub_kategori_limbah || '-');
        const dataSubNonB3 = subKategoriNonB3.map(r => parseFloat(r.total || 0));

        const labelsLok = lokasiData.map(r => r.lokasi || '-');
        const dataLok = lokasiData.map(r => parseFloat(r.total || 0));

        const palette = ['#3b82f6','#10b981','#f59e0b','#ef4444','#8b5cf6','#14b8a6','#f43f5e','#84cc16','#eab308','#06b6d4'];
        const invData = @json($invTonasePerSub ?? []);
        const metodeB3NonB3 = @json($metodeB3NonB3 ?? []);
        const labelsInv = invData.map(r => r.sub_kategori || '-');
        const dataInvTon = invData.map(r => parseFloat(r.total_ton || 0));
        const dataInvKg = dataInvTon.map(t => t * 1000);

        function makePieChart(ctxId, labels, data){
            const ctx = document.getElementById(ctxId);
            if (!ctx) return;
            if (typeof ChartDataLabels !== 'undefined') {
                Chart.register(ChartDataLabels);
            }
            const isSubPie = (ctxId === 'chartTonaseSubKategoriB3' || ctxId === 'chartTonaseSubKategoriNonB3');
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
                    layout: { padding: { top: 0, right: 0, bottom: 0, left: 0 } },
                    plugins: {
                        legend: { display: true, position: isSubPie ? 'right' : 'bottom', labels: { boxWidth: 10 } },
                        datalabels: {
                            color: '#fff',
                            font: { size: 10, weight: 'bold' },
                            formatter: (value, ctx) => {
                                const v = Number(value || 0);
                                return v.toLocaleString(undefined,{maximumFractionDigits:2}) + ' Ton';
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `${ctx.label}: ${ctx.formattedValue} Ton`
                            }
                        }
                    }
                }
            });
        }

        function makeBarChart(ctxId, labels, data){
            const ctx = document.getElementById(ctxId);
            if (!ctx) return;
            if (typeof ChartDataLabels !== 'undefined') {
                Chart.register(ChartDataLabels);
            }
            const isSubBar = (ctxId === 'chartTonaseSubKategoriB3' || ctxId === 'chartTonaseSubKategoriNonB3');
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
                    indexAxis: isSubBar ? 'y' : 'x',
                    plugins: {
                        legend: { display: false },
                        datalabels: {
                            anchor: 'end',
                            align: (ctx) => (ctx.chart?.options?.indexAxis === 'y' ? 'right' : 'top'),
                            clamp: true,
                            formatter: (value, ctx) => {
                                const v = Number(value || 0);
                                return v.toLocaleString(undefined,{maximumFractionDigits:2}) + ' Ton';
                            }
                        },
                        tooltip: (ctxId === 'chartInvTonaseSub') ? {
                            callbacks: {
                                label: (ctx) => {
                                    const ton = ctx.parsed.y ?? 0;
                                    const kg = (ton * 1000);
                                    const tonStr = ton.toLocaleString(undefined,{minimumFractionDigits:0, maximumFractionDigits:2});
                                    const kgStr = kg.toLocaleString(undefined,{minimumFractionDigits:0, maximumFractionDigits:2});
                                    return `${ctx.label}: ${tonStr} Ton (${kgStr} Kg)`;
                                }
                            }
                        } : { }
                    },
                    scales: {
                        x: { ticks: { autoSkip: true, maxRotation: 45, minRotation: 0 }, beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });
        }

        function makeGroupBarChart(ctxId, labels, dataA, dataB, labelA='B3', labelB='Non B3'){
            const ctx = document.getElementById(ctxId);
            if (!ctx) return;
            if (typeof ChartDataLabels !== 'undefined') {
                Chart.register(ChartDataLabels);
            }
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        { label: labelA, data: dataA, backgroundColor: '#ef4444' },
                        { label: labelB, data: dataB, backgroundColor: '#10b981' }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: {
                        legend: { display: true, position: 'bottom' },
                        datalabels: {
                            anchor: 'end', align: 'right', clamp: true,
                            formatter: (value) => Number(value||0).toLocaleString()
                        }
                    },
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });
        }

        makeBarChart('chartTonaseKategori', labelsKat, dataKat);
        // Two bar charts (horizontal): Sub Kategori by B3 and Non B3
        makeBarChart('chartTonaseSubKategoriB3', labelsSubB3, dataSubB3);
        makeBarChart('chartTonaseSubKategoriNonB3', labelsSubNonB3, dataSubNonB3);
        makeBarChart('chartTonaseLokasi', labelsLok, dataLok);

        // Inventarisasi bar chart (Ton)
        makeBarChart('chartInvTonaseSub', labelsInv, dataInvTon);

        // Metode Pengolahan: jumlah data B3 vs Non B3 per metode
        const labelsMet = metodeB3NonB3.map(r => r.metode || '-');
        const dataMetB3 = metodeB3NonB3.map(r => parseInt(r.total_b3 || 0));
        const dataMetNon = metodeB3NonB3.map(r => parseInt(r.total_non_b3 || 0));
        makeGroupBarChart('chartMetodeB3NonB3', labelsMet, dataMetB3, dataMetNon);

    })();
</script>
@endsection
