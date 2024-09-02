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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->dateTime('date');
            $table->unsignedBigInteger('problem_id');
            $table->text('description');
            $table->double('defeated_area');
            $table->integer('status')->nullable();
            $table->integer('user_seen')->nullable();

            $table->unsignedBigInteger('organization_id')->nullable();

            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
