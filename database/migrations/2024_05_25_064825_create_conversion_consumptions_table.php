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
        Schema::create('conversion_consumptions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('conversion_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('culture_id');
            $table->unsignedBigInteger('conversion_type_id');
            $table->unsignedBigInteger('conversion_category_id');
            $table->unsignedBigInteger('conversion_operation_id');
            $table->unsignedBigInteger('conversion_production_mean_id');
            $table->unsignedBigInteger('conversion_naming_id');
            $table->integer('quantity');
            $table->string('quantity_unit');
            $table->double('price');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conversion_id')->references('id')->on('conversions')->onDelete('cascade');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');

            $table->foreign('conversion_type_id')->references('id')->on('conversion_types')->onDelete('cascade');
            $table->foreign('conversion_category_id')->references('id')->on('conversion_categories')->onDelete('cascade');
            $table->foreign('conversion_operation_id')->references('id')->on('conversion_operations')->onDelete('cascade');
            $table->foreign('conversion_production_mean_id')->references('id')->on('conversion_production_means')->onDelete('cascade');
            $table->foreign('conversion_naming_id')->references('id')->on('conversion_namings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversion_consumptions');
    }
};
