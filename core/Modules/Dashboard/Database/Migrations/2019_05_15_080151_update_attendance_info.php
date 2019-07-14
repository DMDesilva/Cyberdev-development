<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAttendanceInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_info', function (Blueprint $table) {
            $table->string('start_time')->nullable()->change();
            $table->string('end_time')->nullable()->change();
            $table->string('time')->nullable()->change();
            $table->string('note')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendance_info', function (Blueprint $table) {
            $table->string('start_time');
            $table->string('end_time');
            $table->string('hours');
            $table->string('note');
        });
    }
}
