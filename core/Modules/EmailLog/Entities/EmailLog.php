<?php

namespace Modules\EmailLog\Entities;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
	protected $fillable = [];

	//type : 1 = main / 2= reminder

	public function payment()
	{
		return $this->belongsTo('Modules\Payment\Entities\Payment', 'payment_id', 'id');
	}

}
