<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_kemitraan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mitra');
            $table->string('jenis');
            $table->string('nama_kegiatan');
            $table->string('sasaran');
            $table->unsignedInteger('jumlah_penerima_manfaat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_kemitraan');
    }
};

