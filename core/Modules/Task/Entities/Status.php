<?php

namespace Modules\Task\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Status extends Model
{
	use SoftDeletes;
	protected $table='issues_status';
	
    protected $fillable = [];
    public $timestamps = 'true';
    public function task()
    {
        return $this->hasOne('Modules\Task\Entities\Task');       
    }	 
}
?>

