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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->integer('angkatan')->nullable();
            $table->enum('jurusan', ['Manajemen Perkantoran dan Layanan Bisnis', '-', 'Pengembangan Perangkat Lunak Dan Gim', 'Teknik Jaringan Komputer Dan Telekomunikasi', 'Hotel', 'Kuliner', 'Pemasaran', 'Desain Komunikasi Visual'])->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('rayon')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('roles', ['user', 'admin']);
            $table->string('status')->nullable();
            $table->text('feedback')->nullable();
            $table->string('profile')->nullable();
            $table->enum('aktivasi_akun', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
