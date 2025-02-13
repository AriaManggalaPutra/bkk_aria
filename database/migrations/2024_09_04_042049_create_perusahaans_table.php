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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_perusahaan');
            $table->text('deskripsi_perusahaan');
            $table->string('jenis_industri');
            $table->enum('jumlah_karyawan', ['10-20', '20-100', '100+']);
            $table->string('logo');
            $table->string('web');
            $table->string('banner');
            $table->string('alamat');
            $table->unsignedBigInteger('id_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
