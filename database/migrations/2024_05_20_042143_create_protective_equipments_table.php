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
        Schema::create('protective_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('title_tj');
            $table->string('image_path');
            $table->unsignedBigInteger('user_id');
            $table->string('front_key')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protective_equipments');
    }
};
