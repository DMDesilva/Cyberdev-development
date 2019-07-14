<?php

namespace Modules\RoleManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleManagement extends Model
{
	use SoftDeletes;
    protected $fillable = [];

     public function roles(){

    	return $this->hasOne('Modules\RoleManagement\Entities\UserRolManage','id', 'created_by'); 
    }

    public function permitionlist(){

    	return $this->hasOne('Modules\RoleManagement\Entities\PermitionRoll','id', 'permition'); 
    }
}
