<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.partials.head', [
    'title' => 'Data — Dahana',
    'metaDescription' => 'Data visual untuk Waste Management System',
    'metaAuthor' => 'Dahana'
])
</head>

<body>
    <div id="wrapper">
        <a href="#" id="back-to-top"></a>

        <!-- preloader begin -->
        <div id="de-loader"></div>
        <!-- preloader end -->

        <!-- header begin -->
        @include('frontend.partials.header', ['headerClass' => 'header-light', 'logoVariant' => 'black'])

        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>


              <section class="bg-color section-dark text-light no-top no-bottom overflow-hidden">
                <div class="container-fluid position-relative half-fluid">
                  <div class="container">
                    <div class="row">
                      <!-- Image -->
                      <div class="col-lg-6 position-lg-absolute right-half h-100">
                        <div class="de-gradient-edge-top dark"></div>
                        <div class="image jarallax">
                            <img src="images/banner2.webp" class="jarallax-img" alt="">
                        </div>
                      </div>
                      <!-- Text -->
                      <div class="col-lg-6 relative">
                            <div class="me-lg-4">
                                <div class="spacer-double"></div>
                                <div class="spacer-double sm-hide"></div>
                                <div class="spacer-single sm-hide"></div>
                                <div class="spacer-single sm-hide"></div>
                                <div class="spacer-single sm-hide"></div>
                                <ul class="crumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Data</li>
                                </ul>
                                <h1 class="mb-2 wow fadeInUp" data-wow-delay=".2s">Data</h1>
                                <p class="col-lg-10 lead mb-0 wow fadeInUp" data-wow-delay=".3s">Data dan Statistik</p>
                                <div class="spacer-double"></div>
                                <div class="spacer-single sm-hide"></div>

                                <img src="images/misc/recycle-crop-2.webp" class="w-30 abs end-0 bottom-0 z-3" alt="">
                            </div>

                      </div>
                    </div>
                  </div>
                </div>
            `</section>


            <section>
                <div class="container">

                        <div class="col-lg-12">

                             <!-- Summary cards -->
            <section class="pt-40 pb-20 bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-white text-dark shadow-sm h-100">
                                <div class="card-body d-flex align-items-center">
                                    <div class="mr-3 text-primary" style="font-size:28px;"><i class="fas fa-recycle"></i></div>
                                    <div>
                                        <div class="text-muted">Jumlah Limbah</div>
                                        <div class="h4 mb-0">{{ (int)($jumlahLimbah ?? 0) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-white text-dark shadow-sm h-100">
                                <div class="card-body d-flex align-items-center">
                                    <div class="mr-3 text-success" style="font-size:28px;"><i class="fas fa-tags"></i></div>
                                    <div>
                                        <div class="text-muted">Jumlah Kategori Limbah</div>
                                        <div class="h4 mb-0">{{ (int)($jumlahKategoriLimbah ?? 0) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-white text-dark shadow-sm h-100">
                                <div class="card-body d-flex align-items-center">
                                    <div class="mr-3 text-info" style="font-size:28px;"><i class="fas fa-handshake"></i></div>
                                    <div>
                                        <div class="text-muted">Total Kemitraan</div>
                                        <div class="h4 mb-0">{{ (int)($totalKemitraan ?? 0) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-white text-dark shadow-sm h-100">
                                <div class="card-body d-flex align-items-center">
                                    <div class="mr-3 text-warning" style="font-size:28px;"><i class="fas fa-newspaper"></i></div>
                                    <div>
                                        <div class="text-muted">Total Kajian</div>
                                        <div class="h4 mb-0">{{ (int)($totalKajian ?? 0) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Charts row 1 -->
            <section class="pt-60 pb-30 bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 mb-4">
                            <div class="card bg-white text-dark shadow-sm">
                                <div class="card-header bg-white text-dark border-bottom" style="color:#0f5132;"><h4 class="mb-0" style="color:#0f5132;">Tonase per Kategori Limbah</h4></div>
                                <div class="card-body" style="height:260px;">
                                    <canvas id="chartTonaseKategori"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="card bg-white text-dark shadow-sm">
                                <div class="card-header bg-white text-dark border-bottom" style="color:#0f5132;"><h4 class="mb-0" style="color:#0f5132;">Tonase per Lokasi</h4></div>
                                <div class="card-body" style="height:260px;">
                                    <canvas id="chartTonaseLokasi"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Charts row 2: Sub Kategori B3/Non B3 -->
            <section class="pb-30 bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 mb-4">
                            <div class="card bg-white text-dark shadow-sm">
                                <div class="card-header bg-white text-dark border-bottom" style="color:#0f5132;"><h4 class="mb-0" style="color:#0f5132;">Sub Kategori — B3</h4></div>
                                <div class="card-body" style="height:280px;">
                                    <canvas id="chartTonaseSubKategoriB3"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="card bg-white text-dark shadow-sm">
                                <div class="card-header bg-white text-dark border-bottom" style="color:#0f5132;"><h4 class="mb-0" style="color:#0f5132;">Sub Kategori — Non B3</h4></div>
                                <div class="card-body" style="height:280px;">
                                    <canvas id="chartTonaseSubKategoriNonB3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Chart: Metode B3 vs Non B3 -->
            <section class="pb-30 bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card bg-white text-dark shadow-sm">
                                <div class="card-header bg-white text-dark border-bottom" style="color:#0f5132;"><h4 class="mb-0" style="color:#0f5132;">Metode Pengolahan (Jumlah Data B3 vs Non B3)</h4></div>
                                <div class="card-body" style="height:360px;">
                                    <canvas id="chartMetodeB3NonB3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Table: Metode per Kategori & Sub Kategori (ton/kg) -->
            <section class="pb-30 bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-transparent border">
                                <div class="card-header bg-white text-dark border-bottom" style="color:#0f5132;"><h4 class="mb-0" style="color:#0f5132;">Metode Pengolahan per Kategori & Sub Kategori</h4></div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-striped mb-0">
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
                                                        // total adalah SUM(tonasi) yang tersimpan dalam Kg
                                                        $kg  = (float) ($row->total ?? 0);
                                                        $ton = $kg / 1000;
                                                        $tonFmt = number_format($ton, 2, ',', '.');
                                                        $kgFmt  = number_format($kg, 0, ',', '.');
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $row->kategori_limbah ?? '-' }}</td>
                                                        <td>{{ $row->sub_kategori_limbah ?? '-' }}</td>
                                                        <td>{{ $row->metode ?? '-' }}</td>
                                                        <td class="text-right">{{ $kgFmt }} kg / {{ $tonFmt }} ton</td>
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
                </div>
            </section>

            <!-- Table: Tonase Berdasarkan Lokasi (dinamis) -->
            <section class="pb-60 bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-transparent border">
                                <div class="card-header bg-white text-dark border-bottom" style="color:#0f5132;"><h4 class="mb-0" style="color:#0f5132;">Jumlah Tonase Berdasarkan Lokasi</h4></div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-dark mb-0">
                                            <thead>
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
                                                @php $fmt = fn($v) => number_format((float)$v, 0, ',', '.'); @endphp
                                                @forelse(($lokasiMatrix ?? []) as $r)
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
                    </div>
                </div>
            </section>







                        </div>



                    </div>
                </div>
            </section>


        </div>
        <!-- content end -->

        @include('frontend.partials.footer')
    </div>

    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
    <script>
        (function(){
            const kategoriData = @json($tonasePerKategori ?? []);
            const lokasiData = @json($tonasePerLokasi ?? []);
            const subB3 = @json($tonaseSubKategoriB3 ?? []);
            const subNonB3 = @json($tonaseSubKategoriNonB3 ?? []);
            const metodeB3NonB3 = @json($metodeB3NonB3 ?? []);

            const labelsKat = kategoriData.map(r => r.kategori_limbah || '-');
            const dataKat = kategoriData.map(r => parseFloat(r.total || 0));
            const labelsLok = lokasiData.map(r => r.lokasi || '-');
            const dataLok = lokasiData.map(r => parseFloat(r.total || 0));
            const labelsSubB3 = subB3.map(r => r.sub_kategori_limbah || '-');
            const dataSubB3 = subB3.map(r => parseFloat(r.total || 0));
            const labelsSubNonB3 = subNonB3.map(r => r.sub_kategori_limbah || '-');
            const dataSubNonB3 = subNonB3.map(r => parseFloat(r.total || 0));

            const palette = ['#3b82f6','#10b981','#f59e0b','#ef4444','#8b5cf6','#14b8a6','#f43f5e','#84cc16','#eab308','#06b6d4'];

            function makeBarChart(ctxId, labels, data, horizontal=false, showLegend=false){
                const ctx = document.getElementById(ctxId);
                if (!ctx) return;
                if (typeof ChartDataLabels !== 'undefined') Chart.register(ChartDataLabels);
                const isKg = (
                    ctxId === 'chartTonaseKategori' ||
                    ctxId === 'chartTonaseLokasi' ||
                    ctxId === 'chartTonaseSubKategoriB3' ||
                    ctxId === 'chartTonaseSubKategoriNonB3'
                );
                const unitLabel = isKg ? ' Kg' : ' Ton';
                new Chart(ctx, {
                    type: 'bar',
                    data: { labels, datasets: [{ label: 'Tonase', data, backgroundColor: labels.map((_,i)=> palette[i % palette.length]) }] },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: horizontal ? 'y' : 'x',
                        plugins: {
                            legend: { display: showLegend },
                            datalabels: { anchor: horizontal ? 'end' : 'end', align: horizontal ? 'right' : 'top', clamp: true,
                                formatter: v => Number(v||0).toLocaleString(undefined,{maximumFractionDigits:2}) + unitLabel },
                            tooltip: isKg ? { callbacks: { label: (ctx) => {
                                const v = (ctx.parsed.y ?? ctx.parsed.x ?? 0);
                                const s = Number(v).toLocaleString(undefined,{minimumFractionDigits:2, maximumFractionDigits:2});
                                return `${ctx.label}: ${s} Kg`;
                            } } } : { }
                        },
                        scales: { x: { beginAtZero: true, ticks: { autoSkip: true } }, y: { beginAtZero: true } }
                    }
                });
            }

            function makeGroupBarChart(ctxId, labels, dataA, dataB, labelA='B3', labelB='Non B3'){
                const ctx = document.getElementById(ctxId);
                if (!ctx) return;
                if (typeof ChartDataLabels !== 'undefined') Chart.register(ChartDataLabels);
                new Chart(ctx, {
                    type: 'bar',
                    data: { labels,
                        datasets: [
                            { label: labelA, data: dataA, backgroundColor: '#ef4444' },
                            { label: labelB, data: dataB, backgroundColor: '#10b981' }
                        ] },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: 'y',
                        plugins: { legend: { display: true, position: 'bottom' }, datalabels: { anchor: 'end', align: 'right', clamp: true,
                            formatter: v => Number(v||0).toLocaleString() } },
                        scales: { x: { beginAtZero: true }, y: { beginAtZero: true } }
                    }
                });
            }

            // Render
            makeBarChart('chartTonaseKategori', labelsKat, dataKat, false, false);
            makeBarChart('chartTonaseLokasi', labelsLok, dataLok, true, false);
            makeBarChart('chartTonaseSubKategoriB3', labelsSubB3, dataSubB3, true, false);
            makeBarChart('chartTonaseSubKategoriNonB3', labelsSubNonB3, dataSubNonB3, true, false);

            const labelsMet = metodeB3NonB3.map(r => r.metode || '-');
            const dataMetB3 = metodeB3NonB3.map(r => parseInt(r.total_b3 || 0));
            const dataMetNon = metodeB3NonB3.map(r => parseInt(r.total_non_b3 || 0));
            makeGroupBarChart('chartMetodeB3NonB3', labelsMet, dataMetB3, dataMetNon);
        })();
    </script>
</body>

</html>
