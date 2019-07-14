<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id');
            $table->text('content')->collate('utf8_unicode_ci');
            $table->integer('type');
            $table->text('status');
            $table->dateTime('status_time');
            $table->integer('parent_id');
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
        Schema::dropIfExists('direct_chat');
    }
}
