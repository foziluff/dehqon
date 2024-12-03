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
        Schema::create('consumptions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('culture_id');
//            $table->unsignedBigInteger('consumption_category_id');
//            $table->unsignedBigInteger('consumption_operation_id');
            $table->string('consumption_category');
            $table->string('consumption_operation');
            $table->unsignedBigInteger('consumption_production_mean_id');
            $table->unsignedBigInteger('consumption_naming_id')->nullable();
            $table->unsignedBigInteger('stock_consumption_id')->nullable();
            $table->string('consumption_naming')->nullable();
            $table->integer('quantity');
            $table->string('quantity_unit');
            $table->double('price');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');
//            $table->foreign('consumption_category_id')->references('id')->on('consumption_categories')->onDelete('cascade');
//            $table->foreign('consumption_operation_id')->references('id')->on('consumption_operations')->onDelete('cascade');
            $table->foreign('consumption_production_mean_id')->references('id')->on('consumption_production_means')->onDelete('cascade');
            $table->foreign('consumption_naming_id')->references('id')->on('consumption_namings')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumptions');
    }
};
