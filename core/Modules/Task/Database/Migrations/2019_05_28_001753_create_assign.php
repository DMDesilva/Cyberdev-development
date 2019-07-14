<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('user_assign');
            $task->integer('task_id');
            $table->string('deadline');
          
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
        Schema::dropIfExists('assign');
    }
}
