<?php

namespace Modules\PermisionManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class loguser extends Model
{
    protected $fillable = [

    			 'id',
        		 'name',
                 'email',
                 'password'
    ];

    public $timestamps = 'true';

    public function developer()
    {
        return $this->hasMany('Modules\Developer\Entities\Developer');
    }
}




