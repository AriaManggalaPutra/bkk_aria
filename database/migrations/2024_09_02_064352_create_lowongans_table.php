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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pekerjaan');
            $table->unsignedBigInteger('id_perusahaan');
            $table->integer('gaji');
            $table->string('lokasi');
            $table->integer('kebutuhan_kandidat');
            $table->text('about_job');
            $table->text('requirement');
            $table->text('responsibility');
            $table->enum('sistem_kerja', ['WFH', 'WFO', 'HYBRID']);
            $table->enum('model_kerja', ['Magang', 'Penuh Waktu', 'Paruh Waktu']);
            $table->date('tanggal_berakhir');
            $table->unsignedBigInteger('id_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
