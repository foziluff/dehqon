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
        Schema::create('culture_season_works', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->string('work_ru');
            $table->string('work_uz');
            $table->string('work_tj');
            $table->unsignedBigInteger('culture_season_id');
            $table->foreign('culture_season_id')->references('id')->on('culture_seasons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culture_season_works');
    }
};
