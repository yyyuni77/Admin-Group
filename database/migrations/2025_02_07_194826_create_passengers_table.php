<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->enum('gender', ['male', 'female']);
            $table->string('student_id')->unique();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('student_card'); // Path to uploaded student card
            $table->boolean('is_verified')->default(false); // Verification status
            $table->boolean('is_suspended')->default(false); // Suspension status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('passengers');
    }
};
