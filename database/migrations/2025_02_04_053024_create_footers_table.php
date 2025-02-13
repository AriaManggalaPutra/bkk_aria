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
        Schema::create('footer', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->text('detail_information'); // Deskripsi BKK
            $table->string('phone')->nullable(); // Nomor Telepon
            $table->string('email')->nullable(); // Email
            $table->text('address')->nullable(); // Alamat
            $table->string('button_link_instagram')->nullable(); // Button link Instagram
            $table->string('button_link_facebook')->nullable(); // Button link Facebook
            $table->string('button_link_twitter')->nullable(); // Button link Twitter
            $table->string('button_link_youtube')->nullable(); // Button link Youtube
            $table->text('social_media_description')->nullable(); // Deskripsi sosial media
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
