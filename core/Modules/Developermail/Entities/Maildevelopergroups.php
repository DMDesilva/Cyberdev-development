<?php

namespace Modules\Developermail\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class maildevelopergroups extends Model
{
    use SoftDeletes;
    protected $table= 'maildevelopergroups';
    protected $fillable = [
        'id',
        'developermail_id',
        'maildevelopergroup_id'
    ];
    public $timestamps = 'true';

    public function developermails(){
        return $this->belongsTo('Modules\Developermail\Entities\Developermail','developermail_id','id');
    }

    public function developergroups(){
        return $this->belongsTo('Modules\Developer\Entities\DeveloperGroup','maildevelopergroup_id','id');
    }
}
