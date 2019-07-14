<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitbucketUsersIssues extends Model
{

    protected $fillable = ['issues_id','responsible'];

    public function bitbucketUser()
    {
        return $this->belongsTo('App\BitbucketUser');
    }

    public function bitbucketIssue()
    {
        return $this->hasMany('App\BitbucketIssue');
    }
}
