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
        {
        // untuk tabel category
        Schema::table('product_categories', function (Blueprint $table) {
            $table->string('hub_category_id')->nullable(); // ID dari aplikasi utama
        });

    }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category_syncs');
    }
};