<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_limbah', function (Blueprint $table) {
            if (!Schema::hasColumn('data_limbah', 'master_lokasi_id')) {
                $table->unsignedBigInteger('master_lokasi_id')->nullable()->after('master_metode_id');
            }
        });

        // Backfill by matching lokasi text to master_lokasi.nama_site
        DB::statement(
            'UPDATE data_limbah d 
             LEFT JOIN master_lokasi l ON l.nama_site = d.lokasi 
             SET d.master_lokasi_id = l.id'
        );

        Schema::table('data_limbah', function (Blueprint $table) {
            $table->foreign('master_lokasi_id')
                ->references('id')->on('master_lokasi')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('data_limbah', function (Blueprint $table) {
            $table->dropForeign(['master_lokasi_id']);
            $table->dropColumn('master_lokasi_id');
        });
    }
};

