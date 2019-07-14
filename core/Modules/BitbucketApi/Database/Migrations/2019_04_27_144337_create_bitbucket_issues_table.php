<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitbucketIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitbucket_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('priority');
            $table->string('title');
            $table->string('content');
            $table->string('local_id');
            $table->string('resource_uri');
            $table->unsignedInteger('reported_by');
            $table->unsignedInteger('bitbucket_repo_id');
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
        Schema::dropIfExists('bitbucket_issues');
    }
}
