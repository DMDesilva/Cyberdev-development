<?php

namespace Modules\RoleManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class PermitionRoll extends Model
{
    protected $fillable = [];
    protected $table= 'permision_managements';

    public function getuser()
    {
        belongsTo('Modules\RoleManagement\Entities\RoleManagement');   
    }


}
