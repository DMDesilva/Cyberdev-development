<?php

namespace Modules\Task\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Assign extends Model
{
	use SoftDeletes;
	protected $table='assign';
	
    protected $fillable = [
    ];
    		 
}
?>



