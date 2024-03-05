<?php

use App\Models\KontrakBeli;
use App\Models\MuatBongkar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('muat_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MuatBongkar::class)->constrained();
            $table->foreignIdFor(KontrakBeli::class)->constrained();
            $table->date('tanggal');
            $table->bigInteger('bruto');
            $table->bigInteger('tarra');
            $table->bigInteger('netto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muat_details');
    }
};
