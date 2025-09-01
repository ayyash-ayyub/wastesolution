<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_limbah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_limbah');
            $table->string('kategori_limbah');
            $table->string('sub_kategori_limbah')->nullable();
            $table->string('metode');
            $table->decimal('tonasi', 10, 2)->default(0);
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_limbah');
    }
};

