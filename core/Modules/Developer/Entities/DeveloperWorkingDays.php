<?php

namespace Modules\Developer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeveloperWorkingDays extends Model
{
    use SoftDeletes;
    protected $table= 'workingdays';
    protected $fillable = [
        'id',
        'developer_id',
        'days',
        'starttime',
        'endtime'];

    public function developer()
    {
        return $this->belongsTo('Modules\Developer\Entities\Developer','developer_id', 'id');
    }
}
