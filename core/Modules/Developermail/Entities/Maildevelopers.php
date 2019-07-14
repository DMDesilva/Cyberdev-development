<?php

namespace Modules\Developermail\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class maildevelopers extends Model
{
    use SoftDeletes;
    protected $table= 'maildevelopers';
    protected $fillable = [
        'id',
        'developermail_id',
        'maildeveloper_id'
    ];

    public $timestamps = 'true';

    public function developermails(){
        return $this->belongsTo('Modules\Developermail\Entities\Developermail','developermail_id','id');
    }
    public function developers(){
        return $this->belongsTo('Modules\Developer\Entities\Developer','maildeveloper_id','id');
    }
}
