<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelServicesTable extends Migration
{
    public function up()
    {
        Schema::create('hotel_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->integer('type_service_id')->unsigned()->nullable();
            $table->foreign('type_service_id')->references('id')->on('types_service');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_services');
    }
}
