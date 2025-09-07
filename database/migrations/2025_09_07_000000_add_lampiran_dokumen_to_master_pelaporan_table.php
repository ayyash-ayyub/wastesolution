<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('master_pelaporan', function (Blueprint $table) {
            if (!Schema::hasColumn('master_pelaporan', 'lampiran_dokumen')) {
                $table->string('lampiran_dokumen')->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('master_pelaporan', function (Blueprint $table) {
            if (Schema::hasColumn('master_pelaporan', 'lampiran_dokumen')) {
                $table->dropColumn('lampiran_dokumen');
            }
        });
    }
};

