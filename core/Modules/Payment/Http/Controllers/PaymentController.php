<?php
namespace Modules\Payment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Payment\Http\Requests\PaymentRequest;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\PaymentCc;
// use Modules\Payment\Entities\EmailQueue;
use Modules\EmailLog\Entities\EmailLog;
use Modules\Client\Entities\Client;
use Modules\Service\Entities\Service;
use DataTables;
use Carbon\Carbon;
use App\Mail\PaymentMail;
use App\Mail\ReminderPaymentMail;
use Mail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
          // $data = Payment::with('client','Ccclient','service')->get();

        // dd($data);
      return view('payment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
      $clients = Client::all();
      $services = Service::all();
      return view('payment::create',compact('clients','services'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PaymentRequest $request)
    {
       // return response()->json(['msg'=>$request->cc_client], 422);
      $payment = new Payment();
      $payment->client_id = $request->client;
        // $payment->cc_client_id = $request->cc_client;
      $payment->service_id = $request->service;
      $payment->service_source = $request->source;
      $payment->amount = $request->amount;
      $payment->duration = $request->duration;
      $payment->start_date = $request->start_date;
      if($request->repeat){
        $payment->repeat = 1;
        $payment->repeat_type = $request->repeat_type;
        if($request->repeat_type == "Custom"){
          $payment->custom_duration = $request->custom_duration;
        }
      }else{
        $payment->repeat = 0;
      }
      $payment->save();

      //set payment no
      $payment_update = Payment::find($payment->id);
      $payment_update->payment_no = 'PAY' . ($payment->id+1000);
      $payment_update->save();

      //save cc clients
      if($request->cc_client && count($request->cc_client)){
        foreach ($request->cc_client as $key => $cc) {
          $carbon_copy = new PaymentCc();
          $carbon_copy->client_id = $cc;
          $carbon_copy->payment_id = $payment->id;
          $carbon_copy->save();
        }
      }

      if($request->start_date == Carbon::today()->toDateString()){
        $this->sendMainEmail($payment);
      }

      return response()->json(['msg'=>'Payment Added Successfully!'], 200);
    }

    public function sendQueuedMail()
    {

      $active_payments = Payment::whereActive(1)->get();
      $main_email_count = 0;
      $reminder_email_count = 0;
      foreach ($active_payments as $key => $payment) {

        if($payment->checkMainEmailSend()){

          $this->sendMainEmail($payment);
          $main_email_count++;
        }

        // dd($payment->checkReminderEmailSend());

        if($payment->checkReminderEmailSend()){

          $this->sendReminderEmail($payment);
          $reminder_email_count++;
        }

      }

      return 'Main Emails : ' . $main_email_count . ',' . 'Reminder Emails : ' . $reminder_email_count;

    }

    private function createEmailLog($payment_id,$type,$content=null)
    {
      $email_log = new EmailLog();
      $email_log->payment_id = $payment_id;
      $email_log->type = $type;
      return $email_log->save();
    }

    private function sendMainEmail($payment){

     $cc_emails = [];
     $bcc_emails=['cyberteam.infomail@gmail.com'];
     foreach ($payment->client_cc as $key => $cc) {
      $cc_emails[] = $cc->client->email;
    }

    Mail::to($payment->client->email)
    ->cc($cc_emails)->bcc($bcc_emails)
    ->send(new PaymentMail($payment));

    return $this->createEmailLog($payment->id,1);
  }

  private function sendReminderEmail($payment){

   $cc_emails = [];
   foreach ($payment->client_cc as $key => $cc) {
    $cc_emails[] = $cc->client->email;
  }

  Mail::to($payment->client->email)
  ->cc($cc_emails)
  ->send(new ReminderPaymentMail($payment));

  return $this->createEmailLog($payment->id,2);
}



    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
      return view('payment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $clients = Client::all();
      $services = Service::all();
      $payment = Payment::find($id);
      $payment_cc = PaymentCc::wherePaymentId($id)->get()->toArray();

      // dd($payment_cc);
      return view('payment::edit',compact('clients','services','payment','payment_cc'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(PaymentRequest $request)
    {
      return view('payment::edit',compact('clients','services'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
     Payment::find($id)->delete();
     return response()->json(['msg'=>'Payment Removed Successfully!'], 200);
   }

   public function data($value='')
   {
    $data = Payment::with('client','client_cc','service')->get();

    return DataTables::make($data)
    ->addIndexColumn()
    ->addColumn('action', function ($row) {

      $buttons = '';

      // $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>'; 
      $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>'; 

        // $buttons = '<button href="javascript:;" class="btn btn-icon-only green data-edit" title="Edit" data-id="'.$row->id.'" onclick="editClick(this)">
        // <i class="fa fa-edit"></i>
        // </button>';

        // $buttons .= '<a href="javascript:;" class="btn btn-icon-only red data-delete" title="Delete" data-id="'.$row->id.'" onclick="deleteClick(this)"">
        // <i class="fa fa-times"></i>
        // </a>';

      return $buttons;
    })
    ->addColumn('client_cc', function ($row) {
     $cc_clients = [];
     foreach ($row->client_cc as $key => $cc) {
      $cc_clients[] = $cc->client->name;
    }


    return count($cc_clients) > 0 ? implode(',', $cc_clients) : '-';
     // return $row->client_cc;

  })
    ->editColumn('repeat', function ($row) {

      switch ($row->repeat) {
        case 0:
        return 'No Repeat';
        break;

        case 1:
        return 'Repeat';
        break;
      }

    })
    ->editColumn('repeat_type', function ($row) {

     if($row->repeat_type == 'Custom'){
      return 'Custom' . '(' . $row->custom_duration . ' days)';
    }else{
      return $row->repeat_type;
    }
  })
    ->make(true);
  }
}
