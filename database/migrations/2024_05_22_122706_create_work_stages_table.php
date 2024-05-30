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
        Schema::create('work_stages', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->unsignedBigInteger('work_id');
            $table->unsignedBigInteger('work_plan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('material');
            $table->double('material_quantity');
            $table->string('material_quantity_unit');
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            $table->foreign('work_plan_id')->references('id')->on('work_plans')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_stages');
    }
};
