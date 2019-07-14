<?php

namespace Modules\DeveloperPayment\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class reason_type extends Model
{
	use SoftDeletes;
	protected $table='reasons';
	
    protected $fillable = [];
    		 
}
?>