<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BitbucketRepository extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','description','language','is_private'];

    protected $dates = ['deleted_at'];
    
    public function bitbucketUsersRepos(){
        return $this->belongsTo('App\BitbucketUsersRepos');
    }
}
