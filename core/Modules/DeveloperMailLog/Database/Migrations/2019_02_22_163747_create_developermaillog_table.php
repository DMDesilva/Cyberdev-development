<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopermaillogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developermaillog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('developermail_id');
            $table->string('content')->nullable();
            $table->integer('type');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developermaillog');
    }
}
