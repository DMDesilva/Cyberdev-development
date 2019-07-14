<?php

namespace Modules\Payment\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Modules\EmailLog\Entities\EmailLog;
use Carbon\Carbon;
class Payment extends Model
{	
	use SoftDeletes;
	protected $fillable = [];

	public function client()
	{
		return $this->belongsTo('Modules\Client\Entities\Client', 'client_id', 'id');
	}

	public function client_cc()
	{
		return $this->hasMany('Modules\Payment\Entities\PaymentCc', 'payment_id', 'id');
	}

	public function service()
	{
		return $this->belongsTo('Modules\Service\Entities\Service', 'service_id', 'id');
	}

	private function checkTodayEmailLog()
	{
		return EmailLog::wherePaymentId($this->id)->whereDate('created_at',Carbon::today()->toDateString())->exists();
	}

	public function checkMainEmailSend()
	{

		//return false if email already sent
		if($this->checkTodayEmailLog()){
			return false;
		}

		switch ($this->repeat_type) {
			case 'Daily':
			return $this->checkMainDailyEmailSend();
			break;
			case 'Weekly':
			return $this->checkMainWeeklyEmailSend();
			break;
			case 'Monthly':
			return $this->checkMainMonthlyEmailSend();
			break;
			case 'Quarterly':
			return ('not complete yet');
			break;
			case 'By Annually':
			return ('not complete yet');
			break;
			
			case 'Annually':
			return ('not complete yet');
			break;

			case 'Custom':
			return $this->checkMainCutomEmailSend();
			break;

			default:
			return ('not complete yet');
			break;
		}
	}

	public function checkReminderEmailSend()
	{

		//return false if email already sent
		if($this->checkTodayEmailLog()){
			return false;
		}

		switch ($this->repeat_type) {
			case 'Daily':
			return ('not complete yet');
			// return $this->checkDailyEmailSend();
			break;
			case 'Weekly':
			return ('not complete yet');
			// return $this->checkWeeklyEmailSend();
			break;
			case 'Monthly':
			return $this->checkReminderMonthlyEmailSend();
			break;
			case 'Quarterly':
			return ('not complete yet');
			break;
			case 'By Annually':
			return ('not complete yet');
			break;
			
			case 'Annually':
			return ('not complete yet');
			break;

			case 'Custom':
			return false;
			break;

			default:
			return ('not complete yet');
			break;
		}
	}



	//monthly ligic

	private function getMonthlyNextDate()
	{
		$queue_date = Carbon::parse($this->start_date)->format('d');
		$this_month = Carbon::today()->format('m');
		$this_year = Carbon::today()->format('Y');

			//backdate to valid date
		$loop_date = $queue_date;
		while(true){
			if(checkdate($this_month, $loop_date, $this_year)){
				$queue_date_string = $this_year . '-' . $this_month . '-' . $loop_date;
				break;
			}
			$loop_date -= 1;
		}

		return $queue_date_string;
	}

	private function checkMainMonthlyEmailSend()
	{
		return $this->getMonthlyNextDate() == Carbon::today()->toDateString();
	}

	private function checkReminderMonthlyEmailSend()
	{
		// $last_main_email_date = Carbon::parse($this->getMonthlyNextDate())->addDays($this->duration)->toDateString();
		$last_main_email = EmailLog::wherePaymentId($this->id)->whereType(1)->orderBy('id','desc')->first();
		if($last_main_email){
			$next_reminder_date = Carbon::parse($last_main_email->created_at)->addDays($this->duration)->toDateString();
		}

		return $next_reminder_date == Carbon::today()->toDateString();
	}

	private function checkMainDailyEmailSend()
	{
		return true;
	}

	private function checkMainWeeklyEmailSend()
	{
		$last_log = EmailLog::wherePaymentId($this->id)->orderBy('id','desc')->first();

		if($last_log){
			$last_date = $last_log->created_at->format('Y-m-d');
		}else{
			$last_date = $this->start_date;
		}

		$next_date = Carbon::parse($last_date)->addWeek()->toDateString();

		return $next_date == Carbon::today()->toDateString();
		
	}

	public function checkMainCutomEmailSend()
	{
		$last_main_email = EmailLog::wherePaymentId($this->id)->whereType(1)->orderBy('id','desc')->first();
		if($last_main_email){
			$last_date = $last_main_email->created_at;
		}else{
			$last_date = $this->start_date;
		}

		$next_date = Carbon::parse($last_date)->addDays($this->custom_duration)->toDateString();

		return $next_date == Carbon::today()->toDateString();
	}

	private function checkQuarterlyEmailSend()
	{
		return true;
	}

	public function lastMainQueueDate(){
		$last_queue = EmailQueue::where(['payment_id'=>$this->id,'type'=>'Main'])->orderBy('id','desc')->first();

		// dd($last_queue);
		return $last_queue->date;
	}
}
