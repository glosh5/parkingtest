<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDonebyOnParkingrecordForgeinkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parking_records', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('recordedBy')->nullable(); 
            $table->foreign('recordedBy')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parking_records', function (Blueprint $table) {
            //
        });
    }
}
