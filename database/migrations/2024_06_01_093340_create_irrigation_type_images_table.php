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
        Schema::create('irrigation_type_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->unsignedBigInteger('irrigation_type_id');
            $table->foreign('irrigation_type_id')->references('id')->on('irrigation_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irrigation_type_images');
    }
};
