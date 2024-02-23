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
        Schema::create('kontrak_belis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('no')->unique();
            $table->foreignId('supplier_id')->constrained();
            $table->decimal('kg',11,2);
            $table->decimal('harga',6,2);
            $table->decimal('ppnpercentage',4,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak_belis');
    }
};
