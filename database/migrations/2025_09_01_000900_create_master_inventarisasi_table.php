<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_inventarisasi', function (Blueprint $table) {
            $table->id();
            $table->string('laporan_inventarisasi'); // Non B3 | B3
            $table->string('kategori');
            $table->string('sub_kategori')->nullable();
            $table->decimal('tonase', 12, 2)->default(0);
            $table->string('uji_kualitas'); // Air | Udara | Tanah
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_inventarisasi');
    }
};

