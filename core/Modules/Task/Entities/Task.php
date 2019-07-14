<?php

namespace Modules\Task\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
	use SoftDeletes;
	protected $table='bitbucket_issues';
	
    protected $fillable = [

        'id',
        'title',
        'type',
        'priority',
        'deadline',
        'hours',
        'status',
    ];

	public $timestamps = 'true';

    public function gettype()
    {
        return $this->belongsTo('Modules\Task\Entities\Type','type', 'id');

    }
     public function getstatus()
    {
        return $this->belongsTo('Modules\Task\Entities\Status','status', 'id');

    }
     public function getpriority()
    {
        return $this->belongsTo('Modules\Task\Entities\Priority','priority', 'id');

    }
    		 
}
?>





