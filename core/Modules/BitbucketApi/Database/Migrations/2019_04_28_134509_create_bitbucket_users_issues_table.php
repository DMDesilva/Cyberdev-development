<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitbucketUsersIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitbucket_users_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('issues_id');
            $table->unsignedInteger('responsible');
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
        Schema::dropIfExists('bitbucket_users_issues');
    }
}
