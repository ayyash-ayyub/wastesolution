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
use App\Models\DataLimbah;
use App\Models\MasterLimbah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
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

        $tonasePerKategori = DataLimbah::select('kategori_limbah', DB::raw('SUM(tonasi) as total'))
            ->groupBy('kategori_limbah')
            ->orderBy('kategori_limbah')
            ->get();

        $tonasePerSubKategori = DataLimbah::select('sub_kategori_limbah', DB::raw('SUM(tonasi) as total'))
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
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('kategori_limbah', 'sub_kategori_limbah', 'metode')
            ->orderBy('kategori_limbah')
            ->orderBy('sub_kategori_limbah')
            ->orderBy('metode')
            ->get();

        return view('dashboard', compact(
            'jumlahLimbah',
            'jumlahKategoriLimbah',
            'tonasePerKategori',
            'tonasePerSubKategori',
            'tonasePerLokasi',
            'metodePerKategoriSub'
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
    Route::get('/master-kemitraan/{master_kemitraan}', [MasterKemitraanController::class, 'show'])->name('master-kemitraan.show');
});
