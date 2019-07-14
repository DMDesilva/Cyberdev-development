<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaildevelopergroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maildevelopergroups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('developermail_id');
            $table->integer('maildevelopergroup_id');
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
        Schema::dropIfExists('maildevelopergroups');
    }
}
