<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTransfersTable extends Migration
{
    public function up()
    {
        Schema::create('type_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_transfers');
    }
}
