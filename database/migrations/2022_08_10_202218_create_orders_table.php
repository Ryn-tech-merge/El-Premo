<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['new','on_going','delivery','ended','canceled'])->default('new');
            $table->date('delivery_date')->nullable();
            $table->double('price')->default(0.0);
            $table->double('discount')->nullable(0.0);
            $table->double('total')->nullable(0.0);
            $table->double('wallet_paid')->nullable(0.0);
            $table->double('cash_paid')->nullable(0.0);

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
        Schema::dropIfExists('orders');
    }
}
