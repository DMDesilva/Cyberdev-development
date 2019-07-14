<?php

namespace Modules\Client\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	use SoftDeletes;
	protected $fillable = [];
}
  ?>