<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('master_inventarisasi', 'laporan_inventarisasi')) {
            Schema::table('master_inventarisasi', function (Blueprint $table) {
                $table->dropColumn('laporan_inventarisasi');
            });
        }
    }

    public function down(): void
    {
        Schema::table('master_inventarisasi', function (Blueprint $table) {
            if (!Schema::hasColumn('master_inventarisasi', 'laporan_inventarisasi')) {
                $table->string('laporan_inventarisasi')->nullable()->after('id');
            }
        });
    }
};

