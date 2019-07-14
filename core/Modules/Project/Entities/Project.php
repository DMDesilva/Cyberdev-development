<?php

namespace Modules\Project\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'description',
        'domain',
        'approved_date',
        'dev_start_date',
        'amount'
    ];

    public function projectclients(){
//        $this->hasMany('App\Comment', 'foreign_key', 'local_key');
        return $this->hasMany('Modules\Project\Entities\ProjectClients');
    }
}
