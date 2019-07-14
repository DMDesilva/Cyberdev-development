<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('project_clients');
        Schema::create('project_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->unsignedInteger('client_id');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::table('project_clients', function($table)
        {
            $table->index('project_id');
            //$table->index('client_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            //$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_clients',function (Blueprint $table) {
            $table->dropForeign('project_id');
         //   $table->dropForeign('client_id');
            $table->dropIndex('position');
        });
    }
}
