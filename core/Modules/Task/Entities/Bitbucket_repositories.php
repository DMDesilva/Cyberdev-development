<?php

namespace Modules\Task\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Bitbucket_repositories extends Model
{
	use SoftDeletes;
	protected $table='bitbucket_repositories';
	
    protected $fillable = [];
    		 
}
?>


