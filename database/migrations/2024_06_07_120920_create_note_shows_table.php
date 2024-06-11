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
        Schema::create('note_shows', function (Blueprint $table) {
            $table->id();
            $table->integer('access')->nullable();
            $table->unsignedBigInteger('asked_for_user_id');
            $table->unsignedBigInteger('asking_user_id');
            $table->foreign('asking_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('asked_for_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_shows');
    }
};
