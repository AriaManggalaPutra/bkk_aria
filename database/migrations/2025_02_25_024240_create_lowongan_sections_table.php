<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lowongan_sections', function (Blueprint $table) {
            $table->id();
            $table->string('outline_title');
            $table->string('solid_title');
            $table->text('detail_information');
            $table->string('button_label');
            $table->string('button_link');
            $table->string('image'); // Mengganti small_image menjadi image
            $table->string('headline_title');
            $table->text('headline_description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongan_sections');
    }
};
