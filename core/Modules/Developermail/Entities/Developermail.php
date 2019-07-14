<?php

namespace Modules\Developermail\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Developermail extends Model
{
    use SoftDeletes;
    protected $table= 'developermail';
    protected $fillable = [
        'id',
        'name',
        'mailtype',
        'duration',
        'startdate',
        'repeat',
        'repeat_type',
        'repeatdays',
        'custom_duration',
        'status'
    ];

    public function maildevelopers()
    {
        return $this->hasMany('Modules\Developermail\Entities\maildevelopers', 'developermail_id', 'id');
    }
    
    public function maildevelopergroups()
    {
        return $this->hasMany('Modules\Developermail\Entities\maildevelopergroups', 'developermail_id', 'id');
    }

    public function mailtypes(){
        return $this->belongsTo('Modules\MailType\Entities\MailType','mailtype','id');
    }

    public function checkMainEmailSend()
    {

        $today_log = DevelopermailLog::wherePaymentId($this->id)->whereDate('created_at',Carbon::today()->toDateString())->exists();

        //return false if email already sent
        if($today_log){
            return false;
        }

        switch ($this->repeat_type) {
            case 'Daily':
                return $this->checkDailyEmailSend();
                break;
            case 'Weekly':
                return $this->checkWeeklyEmailSend();
                break;
            case 'Monthly':
                return $this->checkMonthlyEmailSend();
                break;
            case 'Quarterly':
                return $this->checkQuarterlyEmailSend();
                break;
//            case 'By Annually':
//                return ('not complete yet');
//                break;
            case 'Annually':
                return $this->checkAnnuallyEmailSend();
                //return ('not complete yet');
                break;

            case 'Custom':
                return ('not complete yet');
                break;

            default:
                return ('not complete yet');
                break;
        }
    }

    private function checkMonthlyEmailSend()
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

        return $queue_date_string == Carbon::today()->toDateString();
    }

    private function checkDailyEmailSend()
    {
        $last_log = EmailLog::wherePaymentId($this->id)->orderBy('id','desc')->first();

        if($last_log){
            $last_date = $last_log->created_at->format('Y-m-d');
        }else{
            $last_date = $this->start_date;
        }

        $next_date = Carbon::parse($last_date)->addDay()->toDateString();

        return $next_date == Carbon::today()->toDateString();
    }

    private function checkWeeklyEmailSend()
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

    private function checkQuarterlyEmailSend()
    {
        $last_log = EmailLog::wherePaymentId($this->id)->orderBy('id','desc')->first();

        if($last_log){
            $last_date = $last_log->created_at->format('Y-m-d');
        }else{
            $last_date = $this->start_date;
        }

        $next_date = Carbon::parse($last_date)->addQuarter()->toDateString();

        return $next_date == Carbon::today()->toDateString();

    }

//    private function checkByAnnuallyEmailSend()
//    {
//        $last_log = EmailLog::wherePaymentId($this->id)->orderBy('id','desc')->first();
//
//        if($last_log){
//            $last_date = $last_log->created_at->format('Y-m-d');
//        }else{
//            $last_date = $this->start_date;
//        }
//
//        $next_date = Carbon::parse($last_date)->addMonths(6)->toDateString();
//
//        return $next_date == Carbon::today()->toDateString();
//
//    }

    private function checkAnnuallyEmailSend()
    {
        $last_log = EmailLog::wherePaymentId($this->id)->orderBy('id','desc')->first();

        if($last_log){
            $last_date = $last_log->created_at->format('Y-m-d');
        }else{
            $last_date = $this->start_date;
        }

        $next_date = Carbon::parse($last_date)->addYear()->toDateString();

        return $next_date == Carbon::today()->toDateString();

    }
    public function lastMainQueueDate(){
        $last_queue = EmailQueue::where(['payment_id'=>$this->id,'type'=>'Main'])->orderBy('id','desc')->first();

        // dd($last_queue);
        return $last_queue->date;
    }
}
