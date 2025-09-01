<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('master_inventarisasi', 'uji_kualitas')) {
            Schema::table('master_inventarisasi', function (Blueprint $table) {
                $table->dropColumn('uji_kualitas');
            });
        }
    }

    public function down(): void
    {
        Schema::table('master_inventarisasi', function (Blueprint $table) {
            if (!Schema::hasColumn('master_inventarisasi', 'uji_kualitas')) {
                $table->string('uji_kualitas')->nullable();
            }
        });
    }
};

