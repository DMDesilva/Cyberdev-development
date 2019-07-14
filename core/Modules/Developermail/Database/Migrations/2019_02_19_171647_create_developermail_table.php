<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopermailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('developermail');
        Schema::create('developermail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('mailtype');
            $table->integer('duration');
            $table->date('start_date');
            $table->integer('repeat')->nullable();
            $table->string('repeat_type')->nullable();
            $table->integer('custom_duration')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('developermail');
    }
}
