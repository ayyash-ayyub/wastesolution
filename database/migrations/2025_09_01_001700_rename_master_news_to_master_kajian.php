<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('master_news') && !Schema::hasTable('master_kajian')) {
            Schema::rename('master_news', 'master_kajian');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('master_kajian') && !Schema::hasTable('master_news')) {
            Schema::rename('master_kajian', 'master_news');
        }
    }
};

