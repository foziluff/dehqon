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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('consumption_production_mean_id');
            $table->integer('quantity');
            $table->string('quantity_unit');
            $table->double('price');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('consumption_production_mean_id')->references('id')->on('consumption_production_means')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
