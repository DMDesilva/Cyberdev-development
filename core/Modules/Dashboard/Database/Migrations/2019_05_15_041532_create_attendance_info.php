<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('time');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_info');
    }
}
