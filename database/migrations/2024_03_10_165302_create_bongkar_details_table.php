<?php

use App\Models\KontrakJual;
use App\Models\MuatBongkar;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bongkar_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MuatBongkar::class)->constrained();
            $table->foreignIdFor(KontrakJual::class)->constrained();
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
        Schema::dropIfExists('bongkar_details');
    }
};
