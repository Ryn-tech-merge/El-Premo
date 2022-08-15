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
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->double('price')->default(0.0);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->on('brands')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('sm_unit_id')->nullable();
            $table->foreign('sm_unit_id')->on('units')->references('id')->onDelete('cascade');
            $table->integer('min_sm_amount')->default(1);
            $table->integer('max_sm_amount')->nullable();
            $table->unsignedBigInteger('lg_unit_id')->nullable();
            $table->foreign('lg_unit_id')->on('units')->references('id')->onDelete('cascade');
            $table->integer('min_lg_amount')->default(1);
            $table->integer('max_lg_amount')->nullable();
            $table->integer('lg_sm_amount')->default(1);
            $table->integer('amount')->default(1);



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
