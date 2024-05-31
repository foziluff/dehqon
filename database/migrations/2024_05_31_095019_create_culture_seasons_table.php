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
        Schema::create('culture_seasons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('culture_id');
            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culture_seasons');
    }
};
