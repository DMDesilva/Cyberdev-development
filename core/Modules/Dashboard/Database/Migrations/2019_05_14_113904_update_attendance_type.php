<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAttendanceType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_type', function (Blueprint $table) {
            $table->renameColumn('name', 'user_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendance_type', function (Blueprint $table) {
            $table->renameColumn('username', 'name');
        });
    }
}
