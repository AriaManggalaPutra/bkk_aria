<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visitor_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('month');    // Menyimpan bulan
            $table->integer('year');     // Menyimpan tahun
            $table->integer('view_count')->default(0);  // Menyimpan jumlah views
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_statistic');
    }
};
