<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Make metode column nullable to allow categories without methods (e.g., Ipal)
        DB::statement('ALTER TABLE data_limbah MODIFY metode VARCHAR(255) NULL');
    }

    public function down(): void
    {
        // Revert to NOT NULL with empty string default to avoid failures
        DB::statement("ALTER TABLE data_limbah MODIFY metode VARCHAR(255) NOT NULL DEFAULT ''");
        // Remove default afterwards to match original closer (optional):
        DB::statement("ALTER TABLE data_limbah ALTER COLUMN metode DROP DEFAULT");
    }
};

