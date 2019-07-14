<?php

namespace Modules\Task\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Developer extends Model
{
	use SoftDeletes;
	protected $table='developers';
	
    protected $fillable = [];
    		 
}
?>

