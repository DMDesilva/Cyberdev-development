<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('developers');
        Schema::create('developers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('position')->unsigned();
            $table->string('mobile');
            $table->string('home');
            $table->string('email');
            $table->string('address');
            $table->string('work_type');
            $table->string('bitbucket_user');
            $table->string('auth_id');
            $table->integer('hourly_rate');
            $table->date_time_set('register_date');
            $table->timestamps();
            $table->softDeletes('deleted_at');

        });

        Schema::table('developers', function($table)
        {
            $table->index('position');
            $table->foreign('position')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('developers',function (Blueprint $table) {
            $table->dropForeign('position');
            $table->dropIndex('position');
        });
    }
}
