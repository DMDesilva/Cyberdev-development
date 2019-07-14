<?php

namespace Modules\PermisionManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Userpermition extends Model
{
    protected $fillable = [];
    protected $table= 'users';

     public function getuser()
    {
        belongsTo('Modules\PermisionManagement\Entities\PermisionManagement');   
    }
}
