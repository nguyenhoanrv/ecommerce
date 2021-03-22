<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('category_id');
            $table->uuid('subcategory_id')->nullable();
            $table->uuid('brand_id');

            $table->string('product_name');
            $table->string('product_code');
            $table->integer('product_quantity');
            $table->string('product_details');
            $table->string('product_color');
            $table->string('product_size');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->integer('main_slider')->nullable();
            $table->integer('best_rated')->nullable();
            $table->integer('hot_new')->nullable();
            $table->integer('mid_slider')->nullable();
            $table->integer('trend')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->integer('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}