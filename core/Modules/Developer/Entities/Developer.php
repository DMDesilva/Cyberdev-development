<?php

namespace Modules\Developer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Developer extends Model
{
    use SoftDeletes;
    protected $table= 'developers';
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'position',
        'mobile',
        'home',
        'email',
        'register_date',
        'hourly_rate',
        'address',
        'work_type'
    ];
    public $timestamps = 'true';

    public function position()
    {
        return $this->belongsTo('Modules\Position\Entities\Post','position', 'id');
    }

    public function group()
    {
        return $this->belongsToMany('Modules\Developer\Entities\DeveloperGroup','developer_developergroup', 'id', 'group_id');
    }

//    public function devgroups(){
//        return $this->hasMany('Modules\Developer\Entities\DeveloperGroup');
//    }
    public function maildevelopers(){
        return $this->belongsToMany('Modules\Developermail\Entities\maildevelopers');
    }

    public function workingdays(){
        return $this->hasMany('Modules\Developer\Entities\DeveloperWorkingDays');
    }

}
