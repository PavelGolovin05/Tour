<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTourTable extends Migration
{
    public function up()
    {
        Schema::create('order_tour', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tour_id')->unsigned()->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours');
            $table->integer('city_departure')->unsigned()->nullable();
            $table->foreign('city_departure')->references('id')->on('cities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders_tour');
    }
}
