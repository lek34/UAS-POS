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
        Schema::create('payment_kontrak_belis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('kontrak_beli_id')->constrained();
            $table->decimal('totalbayar', 14, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_kontrak_belis');
    }
};
