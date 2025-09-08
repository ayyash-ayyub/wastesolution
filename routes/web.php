<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterLimbahController;
use App\Http\Controllers\DataLimbahController;
use App\Http\Controllers\MasterMetodeController;
use App\Http\Controllers\MasterLokasiController;
use App\Http\Controllers\MasterPelaporanController;
use App\Http\Controllers\MasterInventarisasiController;
use App\Http\Controllers\MasterKemitraanController;
use App\Http\Controllers\MasterKajianController;
use App\Models\DataLimbah;
use App\Models\MasterLimbah;
use App\Models\MasterKemitraan;
use App\Models\MasterKajian;
use App\Models\MasterInventarisasi;
use App\Models\MasterMetode;
use App\Models\MasterLokasi;
use App\Models\MasterPelaporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return redirect()->route('login');
});

// Frontend pages group
Route::name('frontend.')->group(function () {
    Route::get('/', function () {
        $jumlahLimbah = DataLimbah::count();
        $jumlahKategoriLimbah = MasterLimbah::query()->distinct('nama_kategori')->count('nama_kategori');
        $totalKemitraan = MasterKemitraan::count();
        $totalKajian = MasterKajian::count();

        $stats = [
            'master_limbah' => MasterLimbah::count(),
            'data_limbah'   => DataLimbah::count(),
            'metode'        => MasterMetode::count(),
            'lokasi'        => MasterLokasi::count(),
            'pelaporan'     => MasterPelaporan::count(),
            'kemitraan'     => MasterKemitraan::count(),
            // Tonase per sub_kategori_limbah
            'sum_organik'   => (float) (DataLimbah::whereRaw("LOWER(TRIM(sub_kategori_limbah)) = ?", ['organik'])->sum('tonasi') ?? 0),
            'sum_anorganik' => (float) (DataLimbah::whereRaw("LOWER(TRIM(sub_kategori_limbah)) = ?", ['anorganik'])->sum('tonasi') ?? 0),
            'sum_residu'    => (float) (DataLimbah::whereRaw("LOWER(TRIM(sub_kategori_limbah)) = ?", ['residu'])->sum('tonasi') ?? 0),
            // Tonase per metode pengolahan
            'sum_recycle'   => (float) (DataLimbah::whereRaw("LOWER(TRIM(metode)) = ?", ['recycle'])->sum('tonasi') ?? 0),
            'sum_maggot'    => (float) (DataLimbah::whereRaw("LOWER(TRIM(metode)) = ?", ['maggot'])->sum('tonasi') ?? 0),
            'sum_pirolisis' => (float) (DataLimbah::whereRaw("LOWER(TRIM(metode)) = ?", ['pirolisis'])->sum('tonasi') ?? 0),
        ];

        // Lokasi sites for frontend map
        $lokasiSites = MasterLokasi::orderBy('nama_site')->get(['nama_site','kordinat']);

        return view('frontend.index', compact('jumlahLimbah','jumlahKategoriLimbah','totalKemitraan','totalKajian','stats','lokasiSites'));
    })->name('index');
    Route::get('/index.html', function () {
        return redirect()->route('frontend.index');
    });
    Route::get('/about', fn() => view('frontend.about'))->name('about');
    Route::get('/about.html', fn() => view('frontend.about'));
    Route::get('/kajian', function () {
        $kajians = \App\Models\MasterKajian::orderByDesc('created_at')->get();
        return view('frontend.kajian', compact('kajians'));
    })->name('kajian');
    Route::get('/kajian.html', function () {
        $kajians = \App\Models\MasterKajian::orderByDesc('created_at')->get();
        return view('frontend.kajian', compact('kajians'));
    });
    Route::get('/kajian-single/{kajian}', function ($kajian) {
        $item = \App\Models\MasterKajian::findOrFail($kajian);
        return view('frontend.kajian-single', compact('item'));
    })->name('kajian-single');
    Route::get('/kajian-single.html/{kajian}', function ($kajian) {
        $item = \App\Models\MasterKajian::findOrFail($kajian);
        return view('frontend.kajian-single', compact('item'));
    });
    Route::get('/contact', fn() => view('frontend.contact'))->name('contact');
    Route::get('/contact.html', fn() => view('frontend.contact'));
    Route::get('/gallery', fn() => view('frontend.gallery'))->name('gallery');
    Route::get('/gallery.html', fn() => view('frontend.gallery'));
    Route::get('/projects', fn() => view('frontend.projects'))->name('projects');
    Route::get('/projects.html', fn() => view('frontend.projects'));
    Route::get('/team', fn() => view('frontend.team'))->name('team');
    Route::get('/team.html', fn() => view('frontend.team'));
    Route::get('/data', function () {
        // Summary counts
        $jumlahLimbah = DataLimbah::count();
        $jumlahKategoriLimbah = MasterLimbah::query()->distinct('nama_kategori')->count('nama_kategori');
        $totalKemitraan = MasterKemitraan::count();
        $totalKajian = MasterKajian::count();
        // Aggregate datasets similar to dashboard but public
        $tonasePerKategori = DataLimbah::select('kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->groupBy('kategori_limbah')
            ->orderBy('kategori_limbah')
            ->get();

        $tonasePerLokasi = DataLimbah::select('lokasi', DB::raw('SUM(tonasi) as total'))
            ->groupBy('lokasi')
            ->orderBy('lokasi')
            ->get();

        $tonaseSubKategoriB3 = DataLimbah::select('sub_kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->whereRaw("LOWER(TRIM(kategori_limbah)) = ?", ['b3'])
            ->groupBy('sub_kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->get();

        $tonaseSubKategoriNonB3 = DataLimbah::select('sub_kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->where(function($q){
                $q->whereRaw("LOWER(TRIM(kategori_limbah)) = ?", ['non b3'])
                  ->orWhereRaw("LOWER(TRIM(kategori_limbah)) = ?", ['non-b3']);
            })
            ->groupBy('sub_kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->get();

        $metodeB3NonB3 = DataLimbah::select(
                'metode',
                DB::raw("SUM(CASE WHEN LOWER(TRIM(kategori_limbah)) = 'b3' THEN 1 ELSE 0 END) as total_b3"),
                DB::raw("SUM(CASE WHEN LOWER(TRIM(kategori_limbah)) IN ('non b3','non-b3') THEN 1 ELSE 0 END) as total_non_b3")
            )
            ->groupBy('metode')
            ->orderBy('metode')
            ->get();

        $metodePerKategoriSub = DataLimbah::select(
                'kategori_limbah',
                'sub_kategori_limbah',
                'metode',
                DB::raw('SUM(tonasi) as total')
            )
            ->groupBy('kategori_limbah', 'sub_kategori_limbah', 'metode')
            ->orderBy('kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->orderBy('metode')
            ->get();

        // Dynamic method list + lokasi matrix (tonase)
        $methodList = DataLimbah::selectRaw("LOWER(TRIM(metode)) as metode")
            ->whereNotNull('metode')
            ->distinct()
            ->orderBy('metode')
            ->pluck('metode')
            ->toArray();
        $lokasis = DataLimbah::select('lokasi')->distinct()->pluck('lokasi');
        $lokasiMatrix = [];
        foreach ($lokasis as $lok) {
            $row = [
                'lokasi'     => $lok,
                'organik'    => (float) (DataLimbah::where('lokasi',$lok)->whereRaw("LOWER(TRIM(sub_kategori_limbah)) = 'organik'")->sum('tonasi') ?? 0),
                'anorganik'  => (float) (DataLimbah::where('lokasi',$lok)->whereRaw("LOWER(TRIM(sub_kategori_limbah)) = 'anorganik'")->sum('tonasi') ?? 0),
                'residu'     => (float) (DataLimbah::where('lokasi',$lok)->whereRaw("LOWER(TRIM(sub_kategori_limbah)) = 'residu'")->sum('tonasi') ?? 0),
            ];
            foreach ($methodList as $mc) {
                $row[$mc] = (float) (DataLimbah::where('lokasi',$lok)
                    ->whereRaw("LOWER(TRIM(metode)) = ?", [$mc])
                    ->sum('tonasi') ?? 0);
            }
            $lokasiMatrix[] = $row;
        }

        return view('frontend.data', compact(
            'jumlahLimbah',
            'jumlahKategoriLimbah',
            'totalKemitraan',
            'totalKajian',
            'tonasePerKategori',
            'tonasePerLokasi',
            'tonaseSubKategoriB3',
            'tonaseSubKategoriNonB3',
            'metodeB3NonB3',
            'metodePerKategoriSub',
            'methodList',
            'lokasiMatrix'
        ));
    })->name('data');
    Route::get('/data.html', function(){ return redirect()->route('frontend.data'); });
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (protected)
    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $jumlahLimbah = DataLimbah::count();
        $jumlahKategoriLimbah = MasterLimbah::query()->distinct('nama_kategori')->count('nama_kategori');
        $totalKemitraan = MasterKemitraan::count();
        $totalKajian = MasterKajian::count();

        $tonasePerKategori = DataLimbah::select('kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->groupBy('kategori_limbah')
            ->orderBy('kategori_limbah')
            ->get();

        $tonasePerSubKategori = DataLimbah::select('sub_kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->groupBy('sub_kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->get();

        // Split sub-kategori by kategori_limbah B3 vs Non B3
        $tonaseSubKategoriB3 = DataLimbah::select('sub_kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->whereRaw("LOWER(TRIM(kategori_limbah)) = ?", ['b3'])
            ->groupBy('sub_kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->get();

        $tonaseSubKategoriNonB3 = DataLimbah::select('sub_kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->where(function($q){
                $q->whereRaw("LOWER(TRIM(kategori_limbah)) = ?", ['non b3'])
                  ->orWhereRaw("LOWER(TRIM(kategori_limbah)) = ?", ['non-b3']);
            })
            ->groupBy('sub_kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->get();

        $tonasePerLokasi = DataLimbah::select('lokasi', DB::raw('SUM(tonasi) as total'))
            ->groupBy('lokasi')
            ->orderBy('lokasi')
            ->get();

        $metodePerKategoriSub = DataLimbah::select(
                'kategori_limbah',
                'sub_kategori_limbah',
                'metode',
                DB::raw('SUM(tonasi) as total')
            )
            ->groupBy('kategori_limbah', 'sub_kategori_limbah', 'metode')
            ->orderBy('kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->orderBy('metode')
            ->get();

        $invTonasePerSub = MasterInventarisasi::select(
                'sub_kategori',
                DB::raw('SUM(tonase) as total_ton')
            )
            ->groupBy('sub_kategori')
            ->orderBy('sub_kategori')
            ->get();

        // Metode Pengolahan: jumlah data per metode untuk B3 vs Non B3
        $metodeB3NonB3 = DataLimbah::select(
                'metode',
                DB::raw("SUM(CASE WHEN LOWER(TRIM(kategori_limbah)) = 'b3' THEN 1 ELSE 0 END) as total_b3"),
                DB::raw("SUM(CASE WHEN LOWER(TRIM(kategori_limbah)) IN ('non b3','non-b3') THEN 1 ELSE 0 END) as total_non_b3")
            )
            ->groupBy('metode')
            ->orderBy('metode')
            ->get();

        // Matriks tonase berdasarkan lokasi (Jenis + Metode Pengolahan) - metode dinamis dari DB
        $lokasis = DataLimbah::select('lokasi')->distinct()->pluck('lokasi');
        $methodList = DataLimbah::selectRaw("LOWER(TRIM(metode)) as metode")
            ->whereNotNull('metode')
            ->distinct()
            ->orderBy('metode')
            ->pluck('metode')
            ->toArray();

        $lokasiMatrix = [];
        foreach ($lokasis as $lok) {
            $row = [
                'lokasi'     => $lok,
                'organik'    => (float) (DataLimbah::where('lokasi',$lok)->whereRaw("LOWER(TRIM(sub_kategori_limbah)) = 'organik'")->sum('tonasi') ?? 0),
                'anorganik'  => (float) (DataLimbah::where('lokasi',$lok)->whereRaw("LOWER(TRIM(sub_kategori_limbah)) = 'anorganik'")->sum('tonasi') ?? 0),
                'residu'     => (float) (DataLimbah::where('lokasi',$lok)->whereRaw("LOWER(TRIM(sub_kategori_limbah)) = 'residu'")->sum('tonasi') ?? 0),
            ];
            foreach ($methodList as $mc) {
                $row[$mc] = (float) (DataLimbah::where('lokasi',$lok)
                    ->whereRaw("LOWER(TRIM(metode)) = ?", [$mc])
                    ->sum('tonasi') ?? 0);
            }
            $lokasiMatrix[] = $row;
        }

        return view('dashboard', compact(
            'jumlahLimbah',
            'jumlahKategoriLimbah',
            'tonasePerKategori',
            'tonasePerSubKategori',
            'tonaseSubKategoriB3',
            'tonaseSubKategoriNonB3',
            'tonasePerLokasi',
            'metodePerKategoriSub',
            'invTonasePerSub',
            'metodeB3NonB3',
            'lokasiMatrix',
            'methodList',
            'totalKemitraan',
            'totalKajian'
        ));
    })->name('dashboard');


    // Master Limbah CRUD
    Route::get('/master-limbah', [MasterLimbahController::class, 'index'])->name('master-limbah.index');
    Route::post('/master-limbah', [MasterLimbahController::class, 'store'])->name('master-limbah.store');
    Route::get('/master-limbah/{master_limbah}/edit', [MasterLimbahController::class, 'edit'])->name('master-limbah.edit');
    Route::put('/master-limbah/{master_limbah}', [MasterLimbahController::class, 'update'])->name('master-limbah.update');
    Route::delete('/master-limbah/{master_limbah}', [MasterLimbahController::class, 'destroy'])->name('master-limbah.destroy');

    // Data Limbah CRUD
    Route::get('/data-limbah', [DataLimbahController::class, 'index'])->name('data-limbah.index');
    Route::post('/data-limbah', [DataLimbahController::class, 'store'])->name('data-limbah.store');
    Route::get('/data-limbah/{data_limbah}/edit', [DataLimbahController::class, 'edit'])->name('data-limbah.edit');
    Route::put('/data-limbah/{data_limbah}', [DataLimbahController::class, 'update'])->name('data-limbah.update');
    Route::delete('/data-limbah/{data_limbah}', [DataLimbahController::class, 'destroy'])->name('data-limbah.destroy');

    // Master Metode CRUD
    Route::get('/master-metode', [MasterMetodeController::class, 'index'])->name('master-metode.index');
    Route::post('/master-metode', [MasterMetodeController::class, 'store'])->name('master-metode.store');
    Route::get('/master-metode/{master_metode}/edit', [MasterMetodeController::class, 'edit'])->name('master-metode.edit');
    Route::put('/master-metode/{master_metode}', [MasterMetodeController::class, 'update'])->name('master-metode.update');
    Route::delete('/master-metode/{master_metode}', [MasterMetodeController::class, 'destroy'])->name('master-metode.destroy');

    // Master Lokasi CRUD
    Route::get('/master-lokasi', [MasterLokasiController::class, 'index'])->name('master-lokasi.index');
    Route::post('/master-lokasi', [MasterLokasiController::class, 'store'])->name('master-lokasi.store');
    Route::get('/master-lokasi/{master_lokasi}/edit', [MasterLokasiController::class, 'edit'])->name('master-lokasi.edit');
    Route::put('/master-lokasi/{master_lokasi}', [MasterLokasiController::class, 'update'])->name('master-lokasi.update');
    Route::delete('/master-lokasi/{master_lokasi}', [MasterLokasiController::class, 'destroy'])->name('master-lokasi.destroy');

    // Master Pelaporan CRUD
    Route::get('/master-pelaporan', [MasterPelaporanController::class, 'index'])->name('master-pelaporan.index');
    Route::post('/master-pelaporan', [MasterPelaporanController::class, 'store'])->name('master-pelaporan.store');
    Route::get('/master-pelaporan/{master_pelaporan}/edit', [MasterPelaporanController::class, 'edit'])->name('master-pelaporan.edit');
    Route::put('/master-pelaporan/{master_pelaporan}', [MasterPelaporanController::class, 'update'])->name('master-pelaporan.update');
    Route::delete('/master-pelaporan/{master_pelaporan}', [MasterPelaporanController::class, 'destroy'])->name('master-pelaporan.destroy');

    // Master Inventarisasi CRUD
    Route::get('/master-inventarisasi', [MasterInventarisasiController::class, 'index'])->name('master-inventarisasi.index');
    Route::post('/master-inventarisasi', [MasterInventarisasiController::class, 'store'])->name('master-inventarisasi.store');
    Route::get('/master-inventarisasi/{master_inventarisasi}/edit', [MasterInventarisasiController::class, 'edit'])->name('master-inventarisasi.edit');
    Route::put('/master-inventarisasi/{master_inventarisasi}', [MasterInventarisasiController::class, 'update'])->name('master-inventarisasi.update');
    Route::delete('/master-inventarisasi/{master_inventarisasi}', [MasterInventarisasiController::class, 'destroy'])->name('master-inventarisasi.destroy');

    // Master Kemitraan
    Route::get('/master-kemitraan', [MasterKemitraanController::class, 'index'])->name('master-kemitraan.index');
    Route::post('/master-kemitraan', [MasterKemitraanController::class, 'store'])->name('master-kemitraan.store');
    Route::get('/master-kemitraan/{master_kemitraan}/edit', [MasterKemitraanController::class, 'edit'])->name('master-kemitraan.edit');
    Route::put('/master-kemitraan/{master_kemitraan}', [MasterKemitraanController::class, 'update'])->name('master-kemitraan.update');
    Route::delete('/master-kemitraan/{master_kemitraan}', [MasterKemitraanController::class, 'destroy'])->name('master-kemitraan.destroy');
    Route::get('/master-kemitraan/{master_kemitraan}', [MasterKemitraanController::class, 'show'])->name('master-kemitraan.show');

    // Master Kajian CRUD
    Route::get('/master-kajian', [MasterKajianController::class, 'index'])->name('master-kajian.index');
    Route::post('/master-kajian', [MasterKajianController::class, 'store'])->name('master-kajian.store');
    Route::get('/master-kajian/{master_kajian}/edit', [MasterKajianController::class, 'edit'])->name('master-kajian.edit');
    Route::put('/master-kajian/{master_kajian}', [MasterKajianController::class, 'update'])->name('master-kajian.update');
    Route::delete('/master-kajian/{master_kajian}', [MasterKajianController::class, 'destroy'])->name('master-kajian.destroy');
});
