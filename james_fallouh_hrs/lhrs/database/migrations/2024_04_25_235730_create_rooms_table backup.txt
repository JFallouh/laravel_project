<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->string('room_number')->unique();
                $table->integer('capacity');
                $table->decimal('rate', 8, 2);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
