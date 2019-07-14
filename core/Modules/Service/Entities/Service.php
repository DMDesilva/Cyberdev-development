<?php

namespace Modules\Service\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	use SoftDeletes;
	protected $fillable = [];
}
