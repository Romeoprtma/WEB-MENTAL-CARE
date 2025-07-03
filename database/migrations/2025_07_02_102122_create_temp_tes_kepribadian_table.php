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
        Schema::create('temp_tes_kepribadian', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor'); // tambahkan kolom ini
            $table->text('pernyataan_a');
            $table->text('pernyataan_b');
            $table->string('dimensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_tes_kepribadian');
    }
};
