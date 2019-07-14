<?php

namespace Modules\Developer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeveloperGroup extends Model
{
    use SoftDeletes;
    protected $table= 'developergroups';
    protected $fillable = [
        'id',
        'name'
    ];

    public $timestamps = 'true';
    public function developer()
    {
        return $this->belongsToMany('Modules\Developer\Entities\Developer','developer_developergroup','id','developer_id')->withTimestamps();
    }

//    public function developers(){
//        return $this->hasMany('Modules\Developer\Entities\Developer');
//    }

    public function maildevelopergroups(){
        return $this->belongsToMany('Modules\Developermail\Entities\maildevelopergroups');
    }
}
