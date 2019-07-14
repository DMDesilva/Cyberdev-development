<?php

namespace Modules\RoleManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class UserRolManage extends Model
{
    protected $fillable = [];
    protected $table= 'users';

    public function getuser()
    {
        belongsTo('Modules\RoleManagement\Entities\RoleManagement');   
    }
}
