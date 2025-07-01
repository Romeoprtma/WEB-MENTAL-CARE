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
        Schema::create('tes_kepribadian', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor');
            $table->text('pernyataan A');
            $table->text('pernyataan B');
            $table->string('dimensi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_kepribadian');
    }
};
