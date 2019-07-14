<?php

namespace Modules\MailType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailType extends Model
{
    use SoftDeletes;
    protected $table= 'mailtypes';
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public $timestamps = 'true';
}
