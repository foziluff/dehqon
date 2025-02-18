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
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('conversion_id');
//            $table->unsignedBigInteger('product_type_id');
//            $table->unsignedBigInteger('culture_id');
//            $table->unsignedBigInteger('conversion_type_id');
//            $table->unsignedBigInteger('conversion_category_id');
//            $table->unsignedBigInteger('conversion_operation_id');
            $table->unsignedBigInteger('consumption_production_mean_id');
            $table->unsignedBigInteger('stock_consumption_id')->nullable();
//            $table->unsignedBigInteger('conversion_naming_id');
            $table->string('conversion_type');
            $table->string('conversion_category');
            $table->string('conversion_operation');
            $table->string('conversion_naming');
            $table->double('quantity');
            $table->string('quantity_unit');
            $table->double('price');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conversion_id')->references('id')->on('conversions')->onDelete('cascade');
//            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
//            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');

//            $table->foreign('conversion_type_id')->references('id')->on('conversion_types')->onDelete('cascade');
//            $table->foreign('conversion_category_id')->references('id')->on('conversion_categories')->onDelete('cascade');
//            $table->foreign('conversion_operation_id')->references('id')->on('conversion_operations')->onDelete('cascade');
            $table->foreign('consumption_production_mean_id')->references('id')->on('consumption_production_means')->onDelete('cascade');
            $table->foreign('stock_consumption_id')->references('id')->on('stock_consumptions')->onDelete('cascade');
//            $table->foreign('conversion_naming_id')->references('id')->on('conversion_namings')->onDelete('cascade');
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
