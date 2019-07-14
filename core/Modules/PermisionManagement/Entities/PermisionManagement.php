<?php

namespace Modules\PermisionManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermisionManagement extends Model
{
	use SoftDeletes;
    protected $fillable = [];

     public function roles(){

    	return $this->hasOne('Modules\PermisionManagement\Entities\Userpermition','id', 'created_by'); 
    }

}
