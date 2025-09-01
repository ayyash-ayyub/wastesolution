<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('master_inventarisasi')
            ->where('kategori', 'no B3')
            ->update(['kategori' => 'Non B3']);
    }

    public function down(): void
    {
        DB::table('master_inventarisasi')
            ->where('kategori', 'Non B3')
            ->update(['kategori' => 'no B3']);
    }
};

