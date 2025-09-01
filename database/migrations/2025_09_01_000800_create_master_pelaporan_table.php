<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_pelaporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_laporan');
            $table->date('periode_mulai');
            $table->date('periode_selesai');
            $table->string('status')->default('belum dilaporkan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_pelaporan');
    }
};

