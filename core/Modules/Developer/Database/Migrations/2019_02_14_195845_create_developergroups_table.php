<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopergroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('developergroups');
        Schema::create('developergroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::dropIfExists('developergroups');
    }
}
