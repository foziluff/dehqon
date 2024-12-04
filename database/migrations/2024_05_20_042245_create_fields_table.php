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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('front_key')->nullable();
            $table->unsignedBigInteger('culture_id');
            $table->string('sort')->nullable();
            $table->double('area');
            $table->unsignedBigInteger('irrigation_id')->nullable();
            $table->year('sowing_year')->nullable();
            $table->unsignedBigInteger('prev_culture_id')->nullable();
            $table->string('prev_sort')->nullable();
            $table->year('prev_sowing_year')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->text('coordinates');

            $table->timestamps();

            $table->foreign('irrigation_id')->references('id')->on('irrigations');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('culture_id')->references('id')->on('cultures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
