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
        Schema::create('conversion_incomes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('conversion_id');
//            $table->unsignedBigInteger('conversion_type_id');
//            $table->unsignedBigInteger('conversion_naming_id');
            $table->string('conversion_type');
            $table->string('conversion_naming');
            $table->integer('quantity');
            $table->string('quantity_unit');
            $table->double('price');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conversion_id')->references('id')->on('conversions')->onDelete('cascade');
//            $table->foreign('conversion_type_id')->references('id')->on('conversion_types')->onDelete('cascade');
//            $table->foreign('conversion_naming_id')->references('id')->on('conversion_namings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversion_incomes');
    }
};
