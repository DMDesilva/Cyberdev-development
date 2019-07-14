<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitbucketUser extends Model
{
    protected $fillable = ['username'];

    public function bitbucketUsersRepos(){
        return $this->belongsTo('App\BitbucketUsersRepos');
    }
    
}
