<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->integer('amount')->default(1);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('type',['value','percentage'])->nullable();
            $table->double('value')->default(0);
            $table->double('percentage')->default(0);
            $table->double('old_price')->default(0);
            $table->double('price')->default(0);



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
        Schema::dropIfExists('offers');
    }
}
