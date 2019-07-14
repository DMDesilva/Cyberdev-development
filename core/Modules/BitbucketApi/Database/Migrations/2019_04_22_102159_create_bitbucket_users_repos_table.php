<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitbucketUsersReposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitbucket_users_repos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bitbucket_users_id');
            $table->unsignedInteger('bitbucket_repositories_id');
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
        Schema::dropIfExists('bitbucket_users_repos');
    }
}
