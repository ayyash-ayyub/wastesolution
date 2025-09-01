<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Standardize across likely tables
        DB::table('master_limbah')->where('nama_kategori', 'no B3')->update(['nama_kategori' => 'Non B3']);
        DB::table('data_limbah')->where('kategori_limbah', 'no B3')->update(['kategori_limbah' => 'Non B3']);
        DB::table('master_metode')->where('kategori_sampah', 'no B3')->update(['kategori_sampah' => 'Non B3']);
        // master_inventarisasi handled in previous migration
    }

    public function down(): void
    {
        // Revert to 'no B3' if needed
        DB::table('master_limbah')->where('nama_kategori', 'Non B3')->update(['nama_kategori' => 'no B3']);
        DB::table('data_limbah')->where('kategori_limbah', 'Non B3')->update(['kategori_limbah' => 'no B3']);
        DB::table('master_metode')->where('kategori_sampah', 'Non B3')->update(['kategori_sampah' => 'no B3']);
    }
};

