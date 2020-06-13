<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->integer('count_peoples');
            $table->integer('cost');
            $table->date('start_tour');
            $table->date('end_tour');
            $table->integer('type_transfer_id')->unsigned()->nullable();
            $table->foreign('type_transfer_id')->references('id')->on('type_transfers');
            $table->boolean('hotel_delivery');
            $table->boolean('insurance');
            $table->boolean('residence');
            $table->boolean('visa');
            $table->boolean('food');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
