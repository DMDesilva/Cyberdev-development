<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectCodeAndProjectDeadlineDateAndVctServiceTypeIdAndReposIdProjectStageIdAndStatusToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_code');
            $table->dateTime('project_deadline_date');
            $table->unsignedInteger('vcr_service_type_id');
            $table->unsignedInteger('repos_id');
            $table->unsignedInteger('project_stage_id');
            $table->boolean('status');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
