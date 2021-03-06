<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesRoomTable extends Migration
{
    public function up()
    {
        Schema::create('types_room', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types_room');
    }
}
