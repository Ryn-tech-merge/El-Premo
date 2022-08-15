<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('code')->default('+20');
            $table->string('address')->nullable();
            $table->double('latitude')->default(0.0);
            $table->double('longitude')->default(0.0);
            $table->string('shop_image')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_address')->nullable();
            $table->integer('wallet')->default(0);
            $table->enum('block',['yes','no'])->default('no');

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
        Schema::dropIfExists('users');
    }
}
