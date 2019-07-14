<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Dear {{$payment->client->good_name}},</p>
<p>
This email is to inform you about next payment of {{$payment->service->name}} under {{$payment->service_source}} we have given you. Below are the full details of your payment,</p>
<ul>
	<li>Service name: {{$payment->service->name}}</li>
	<li>Service source: {{$payment->service_source}}</li>
	<li>Effective date: {{$payment->start_date}} / {{date('Y-m-d')}}</li>
	<li>Amount: {{$payment->amount}}</li>
</ul>
<p>Please complete your payment to below mentioned our agent’s account</p>
<ul>
	<li>Name as in account:</li>
	<li>Bank name:</li>
	<li>Account Number:</li>
	<li>Branch:</li>
</ul>	
<p>
Please pay above mentioned amount before {{date('Y-m-d')}} + {{$payment->duration}} days and avoid service interruption and late payment charges. <br>Please ignore this email if you’re already done the payment
</p>
<p>
Note: <br>
Late payments fee of {{$payment->service->due_percentage}}% per month will be calculated daily to your due amount and will be added daily to your due amount
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
</html>