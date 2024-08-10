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
        Schema::create('agro_credits', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('title_tj');

            $table->text('description_ru');
            $table->text('description_uz');
            $table->text('description_tj');

            $table->string('address_ru');
            $table->string('address_uz');
            $table->string('address_tj');
            $table->string('phone');
            $table->string('email');
            $table->string('site');
            $table->string('image_path');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agro_credits');
    }
};
