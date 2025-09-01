<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add CHECK constraints for allowed category values
        // Note: Requires MySQL 8+ to enforce; older versions parse but ignore CHECK.
        DB::statement("ALTER TABLE master_limbah ADD CONSTRAINT chk_master_limbah_kategori CHECK (nama_kategori IN ('Non B3','B3','Ipal'))");
        DB::statement("ALTER TABLE master_metode ADD CONSTRAINT chk_master_metode_kategori CHECK (kategori_sampah IN ('Non B3','B3','Ipal'))");
        DB::statement("ALTER TABLE data_limbah ADD CONSTRAINT chk_data_limbah_kategori CHECK (kategori_limbah IN ('Non B3','B3','Ipal'))");
        DB::statement("ALTER TABLE master_inventarisasi ADD CONSTRAINT chk_master_inventarisasi_kategori CHECK (kategori IN ('Non B3','B3'))");
    }

    public function down(): void
    {
        // Drop CHECK constraints
        DB::statement("ALTER TABLE master_limbah DROP CHECK chk_master_limbah_kategori");
        DB::statement("ALTER TABLE master_metode DROP CHECK chk_master_metode_kategori");
        DB::statement("ALTER TABLE data_limbah DROP CHECK chk_data_limbah_kategori");
        DB::statement("ALTER TABLE master_inventarisasi DROP CHECK chk_master_inventarisasi_kategori");
    }
};

