<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('customer_id')->constrained()->onDelete('cascade');
                $table->foreignId('room_id')->constrained()->onDelete('cascade');
                $table->date('check_in_date');
                $table->date('check_out_date');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
