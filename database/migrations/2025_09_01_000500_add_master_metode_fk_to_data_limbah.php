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
            if (!Schema::hasColumn('data_limbah', 'master_metode_id')) {
                $table->unsignedBigInteger('master_metode_id')->nullable()->after('metode');
            }
        });

        // Backfill master_metode_id based on matching kategori + nama_metode
        DB::statement(
            'UPDATE data_limbah d 
             LEFT JOIN master_metode m 
               ON m.kategori_sampah = d.kategori_limbah 
              AND m.nama_metode = d.metode 
             SET d.master_metode_id = m.id'
        );

        // Add foreign key constraint
        Schema::table('data_limbah', function (Blueprint $table) {
            $table->foreign('master_metode_id')
                ->references('id')->on('master_metode')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('data_limbah', function (Blueprint $table) {
            $table->dropForeign(['master_metode_id']);
            $table->dropColumn('master_metode_id');
        });
    }
};

