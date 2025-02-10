<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromDriversTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropColumn([ 'name', 'email', 'phone']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('drivers', function (Blueprint $table) {
            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
        });
    }
}
