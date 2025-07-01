<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tes_kepribadian', function (Blueprint $table) {
            $table->renameColumn('pernyataan A', 'pernyataan_a');
            $table->renameColumn('pernyataan B', 'pernyataan_b');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tes_kepribadian', function (Blueprint $table) {
            $table->renameColumn('pernyataan_a', 'pernyataan A');
            $table->renameColumn('pernyataan_b', 'pernyataan B');
        });
    }
};
