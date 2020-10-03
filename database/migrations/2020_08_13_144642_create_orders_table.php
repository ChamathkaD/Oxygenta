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
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('nic', 255);
            $table->string('gender', 20);
            $table->date('dob');
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('street', 100);
            $table->integer('zip');
            $table->string('phone');
            $table->string('email', 100);
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
