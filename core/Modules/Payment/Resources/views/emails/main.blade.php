<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$date = date('Y-m-d');
		$durationDate = date('F jS, Y',strtotime($date . "+".$payment->duration." days"));
	?>
<p>Dear {{$payment->client->good_name}},</p>

<p>This email is to inform you about upcoming payment for {{$payment->service->name}} under {{$payment->service_source}} we have given you. Below are the full details of your payment,</p>

<ul>
	<li style="font-weight: bold;">Service name: {{$payment->service->name}}</li>
	<li style="font-weight: bold;">Service source: {{$payment->service_source}}</li>
	<li style="font-weight: bold;">Effective on: {{date('F, Y')}}</li>
	<li style="font-weight: bold;">Amount: {{$payment->amount}}.00</li>
</ul>

<p>Please complete your payment to below mentioned our agent’s account</p>

<ul>
	<li>Name as in account: ML Hettiarachchi</li>
	<li>Bank name: Commercial Bank plc</li>
	<li>Account Number: 8001647057</li>
	<li>Branch: Malabe</li>
</ul>	

<p>Please pay above mentioned amount before {{$durationDate}} and send an image / receipt of your payment proofment via WhatsApp +9471-33 99 099 and avoid service interruption and late payment charges.<br>Please ignore this email if you already done the payment.</p>

<p>Note:<br>
Late payments fee of {{$payment->service->due_percentage}}% per month will be calculated daily to your due amount and will be added daily to your due amount.</p>

<p style="color: #ff0000;">**This is a auto generated email and please use <a href="mailto:cyberteam.infomail@gmail.com">Cyberteam.infomail@gmail.com</a> email if you want to reply**<br><br></p>

<p>
Thank you<br>
--
<br>
Cybertech Int Ltd (Also known as Team Cybertech)<br>
Whatsapp / Phone: +9471 33 99 099<br>
Email: Cyberteam.infomail@gmail.com
<p>
</body>
</html>