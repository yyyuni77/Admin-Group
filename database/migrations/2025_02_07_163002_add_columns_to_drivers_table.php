<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDriversTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('fullname');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('student_id')->unique();
            $table->string('email')->unique();
            $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropColumn(['fullname', 'gender', 'student_id', 'email', 'phone']);
        });
    }
}
