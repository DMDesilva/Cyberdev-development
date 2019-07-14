<?php

namespace Modules\DeveloperMailLog\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class DeveloperMailLog extends Model
{
    use SoftDeletes;
    protected $table= 'developermaillog';
    protected $fillable = [
        'id',
        'developermail_id',
        'content',
        'type',
    ];

    public function developermails()
    {
        return $this->belongsTo('Modules\Developermail\Entities\Developermail', 'developermail_id', 'id');
    }
}
