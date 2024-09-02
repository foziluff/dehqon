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
        Schema::create('rotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('culture_id');
            $table->string('culture_sort');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('sowing_date');
            $table->dateTime('harvesting_date');
            $table->double('average_yield');
            $table->string('average_yield_unit');

            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotations');
    }
};
