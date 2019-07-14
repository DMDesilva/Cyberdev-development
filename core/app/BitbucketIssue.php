<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitbucketIssue extends Model
{
    protected $fillable = ['status','priority','title','content','local_id','resource_uri','reported_by','bitbucket_repo_id'];

    public function bitbucketUsersIssues(){
        return $this->belongsTo('App\BitbucketUsersIssues');
    }
}
