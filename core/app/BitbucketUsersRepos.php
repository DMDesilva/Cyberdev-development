<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitbucketUsersRepos extends Model{

    protected $fillable = ['bitbucket_users_id','bitbucket_repositories_id'];


    public function bitbucketUser()
    {
        return $this->hasMany('App\BitbucketUser');
    }
    public function bitbucketRepository()
    {
        return $this->hasMany('App\BitbucketRepository');
    }
}

