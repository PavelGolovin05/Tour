<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('photo_link');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('type_food_id')->unsigned()->nullable();
            $table->foreign('type_food_id')->references('id')->on('types_food');
            $table->integer('stars');
            $table->text('description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
