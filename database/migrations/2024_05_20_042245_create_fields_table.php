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
            $table->unsignedBigInteger('culture_id');
            $table->string('sort');
            $table->double('area');
            $table->unsignedBigInteger('fuel_type_id')->nullable();
            $table->year('sowing_year')->nullable();
            $table->unsignedBigInteger('prev_culture_id')->nullable();
            $table->string('prev_sort')->nullable();
            $table->year('prev_sowing_year')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->text('coordinates');

            $table->timestamps();

            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
            $table->foreign('user_id')->references('id')->on('users');
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
