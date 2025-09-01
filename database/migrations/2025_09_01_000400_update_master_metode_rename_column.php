<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('master_metode', function (Blueprint $table) {
            if (!Schema::hasColumn('master_metode', 'nama_metode')) {
                $table->string('nama_metode')->nullable()->after('kategori_sampah');
            }
        });

        // Copy data
        if (Schema::hasColumn('master_metode', 'sub_kategori')) {
            DB::statement('UPDATE master_metode SET nama_metode = sub_kategori WHERE nama_metode IS NULL');
        }

        // Attempt to drop old column (may require DBAL on some setups)
        if (Schema::hasColumn('master_metode', 'sub_kategori')) {
            Schema::table('master_metode', function (Blueprint $table) {
                $table->dropColumn('sub_kategori');
            });
        }

        // Ensure new column not nullable to mimic original behavior
        Schema::table('master_metode', function (Blueprint $table) {
            $table->string('nama_metode')->nullable()->change();
        });
    }

    public function down(): void
    {
        // Best effort: re-create sub_kategori and copy back
        Schema::table('master_metode', function (Blueprint $table) {
            if (!Schema::hasColumn('master_metode', 'sub_kategori')) {
                $table->string('sub_kategori')->nullable()->after('kategori_sampah');
            }
        });

        if (Schema::hasColumn('master_metode', 'nama_metode')) {
            DB::statement('UPDATE master_metode SET sub_kategori = nama_metode WHERE sub_kategori IS NULL');
        }

        if (Schema::hasColumn('master_metode', 'nama_metode')) {
            Schema::table('master_metode', function (Blueprint $table) {
                $table->dropColumn('nama_metode');
            });
        }
    }
};

