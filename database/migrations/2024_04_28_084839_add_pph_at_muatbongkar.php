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
        Schema::table('muat_bongkars', function (Blueprint $table) {
            //
            $table->decimal('pphpercentage', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('muat_bongkars', function (Blueprint $table) {
            //
            $table->dropColumn('pphpercentage');
        });
    }
};
