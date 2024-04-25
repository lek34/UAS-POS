<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('muat_bongkars', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->foreignId('supir_id')->constrained();
            $table->foreignId('armada_id')->constrained();
            $table->bigInteger('muat');
            $table->bigInteger('bongkar');
            $table->bigInteger('susut');
            $table->bigInteger('potsusut');
            $table->bigInteger('ongkos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muat_bongkars');
    }
};
