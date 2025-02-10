<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments ('id');
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->foreignId('passenger_id')->constrained('passengers')->onDelete('cascade');
            $table->string('pickup_location');
            $table->string('dropoff_location');
            $table->enum('status', ['pending', 'ongoing', 'completed', 'cancelled']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
