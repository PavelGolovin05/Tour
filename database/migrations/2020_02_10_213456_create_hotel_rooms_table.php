<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->integer('type_rooms_id')->unsigned()->nullable();
            $table->foreign('type_rooms_id')->references('id')->on('types_room');
            $table->integer('count');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
