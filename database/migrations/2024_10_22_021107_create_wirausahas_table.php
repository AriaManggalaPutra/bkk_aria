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
        Schema::create('wirausahas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->string('bidang_usaha');
            $table->unsignedBigInteger('id_user');
            $table->integer('omzet');
            $table->date('tanggal_mulai');
            $table->enum('status_wirausaha', ['Masih', 'Tidak']);
            $table->date('tanggal_berakhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wirausahas');
    }
};
