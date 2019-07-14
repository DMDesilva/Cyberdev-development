<?php

namespace Modules\Task\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Priority extends Model
{
	use SoftDeletes;
	protected $table='task_priorities';
	
    protected $fillable = ['id','name'];

			 
	public $timestamps = 'true';
    public function task()
    {
        return $this->hasOne('Modules\Task\Entities\Task');       
    }
}
?>

