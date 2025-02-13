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
        Schema::create('pekerjaan_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_perusahaan');
            $table->string('posisi');
            $table->enum('model_kerja', ['Magang', 'Penuh Waktu', 'Paruh Waktu']);
            $table->date('tanggal_mulai');
            $table->enum('status_bekerja', ['Masih', 'Tidak']);
            $table->date('tanggal_berakhir')->nullable();
            $table->string('alamat_perusahaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_users');
    }
};
