<?php

namespace Modules\Position\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    protected $table= 'positions';
    protected $fillable = [
        'id',
        'name',
        'description',
        'amount'
    ];
    public $timestamps = 'true';

    public function developer()
    {
        return $this->hasMany('Modules\Developer\Entities\Developer');
    }
}
