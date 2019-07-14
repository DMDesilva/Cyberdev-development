<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotDeveloperGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_developergroup', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('developer_id');
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
        Schema::dropIfExists('pivot_developer_group');
    }
}
