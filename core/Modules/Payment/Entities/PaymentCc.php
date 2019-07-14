<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentCc extends Model
{
	protected $table = 'payment_cc';
    protected $fillable = [];

   	public function client()
	{
		return $this->belongsTo('Modules\Client\Entities\Client', 'client_id', 'id');
	}
}
