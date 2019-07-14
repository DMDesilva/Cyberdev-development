<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;

class EmailQueue extends Model
{
	protected $fillable = [];

	public static function getTemplate($data)
	{
		$template = '<!DOCTYPE html>
		<html>
		<head>
		<title></title>
		</head>
		<body>
		<p>Dear ' . $data['customer_name'] . ',</p>
		<p>
		This email is to inform you about next payment of $Service name under ' . $data['service_source'] . ' we have given you. Below are the full details of your payment,</p>
		<ul>
		<li>Service name: ' . $data['service_name'] . '</li>
		<li>Service source: ' . $data['service_source'] . '</li>
		<li>Effective date: ' . $data['start_date'] . ' / ' . $data['repeat_date'] . '</li>
		<li>Amount: $Amount</li>
		</ul>
		<p>Please complete your payment to below mentioned our agent’s account</p>
		<ul>
		<li>Name as in account:</li>
		<li>Bank name:</li>
		<li>Account Number:</li>
		<li>Branch:</li>
		</ul>	
		<p>
		Please pay above mentioned amount before $Effective date + $Due duration and avoid service interruption and late payment charges. Please ignore this email if you’re already done the payment
		</p>
		<p>
		Note: <br>
		Late payments fee of $Due percentage per month will be calculated daily to your due amount and will be added daily to your due amount
		</p>
		<p>
		This is auto generated email and do not reply<br>
		Thank you
		</p>
		<p>
		--
		<br>
		Team Cybertech
		<br>
		Whatsapp / Phone: +94 71 33 99 099
		<p>
		</body>
		</html>';
	}
}
