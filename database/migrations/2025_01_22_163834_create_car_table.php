<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car', function (Blueprint $table) {
            $table->increments ('id');
                $table->unsignedInteger ('driver_id')->nullable();
                $table->string('LicenseNo');
                $table->string('CarModel');
                $table->string('CarColor');
                $table->string('CarPlate');
                $table->integer('CarCapacity');
                $table->string('CarPlatRoadtax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car');
    }
};
