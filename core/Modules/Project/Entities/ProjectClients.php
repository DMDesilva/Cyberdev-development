<?php

namespace Modules\Project\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProjectClients extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'project_id',
        'client_id'
    ];

    public function project(){
        return $this->belongsTo('Modules\Project\Entities\Project','project_id','id');
    }

    public function client(){
        return $this->belongsTo('Modules\Client\Entities\Client','client_id','id');
    }
}
