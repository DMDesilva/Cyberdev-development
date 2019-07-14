<?php

namespace Modules\Developermail\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Developer\Entities\Developer;
use Modules\Developer\Entities\DeveloperGroup;
use Modules\Developermail\Entities\Developermail;
use Modules\Developermail\Entities\Maildevelopergroups;
use App\Mail\Developermailable;
use Modules\Developermail\Entities\Maildevelopers;
use Modules\Developermail\Http\Requests\Developermailrequest;
use Modules\DeveloperMailLog\Entities\DeveloperMailLog;
use Modules\MailType\Entities\MailType;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Mail;

class DevelopermailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('developermail::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $mailtypes = MailType::all();
        $developergroups = DeveloperGroup::all();
        $developers = Developer::all();
        return view('developermail::create', compact('mailtypes','developergroups','developers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Developermailrequest $request)
    {
        $developermail = new Developermail();
        $developermail->name = $request->name;
        $developermail->mailtype = $request->mailtype;
        $developermail->duration = $request->duration;
        $developermail->start_date = $request->start_date;
        $developermail->status = $request->status;
        if($request->repeat){
            $developermail->repeat = 1;
            $developermail->repeat_type = $request->repeat_type;
            if($request->repeat_type == "Custom"){
                $developermail->custom_duration = $request->custom_duration;
            }
        }else{
            $developermail->repeat = 0;
        }

        $developermail->save();
        if(!empty($request->devgroups)){
            foreach ($request->devgroups as $key => $cc) {
                $mdg = new maildevelopergroups();
                $mdg->developermail_id = $developermail->id;
                $mdg->maildevelopergroup_id = $cc;
                $mdg->save();
            }
        }

        if(!empty($request->developers)){
            foreach ($request->developers as $key => $cc) {
                $mdg = new maildevelopers();
                $mdg->developermail_id = $developermail->id;
                $mdg->maildeveloper_id = $cc->id;
                $mdg->save();
            }
        }
        if($request->start_date == Carbon::today()->toDateString()){
            $this->sendMainEmail($developermail);
        }

        return response()->json(['msg'=>'Payment Added Successfully!'], 200);


    }

    private function sendMainEmail($developermail){

        $cc_emails = [];
        if($developermail->maildevelopers){
            foreach ($developermail->maildevelopers as $key => $cc) {
                $cc_emails[] = $cc->developers->email;
            }
        }

        //print_r($cc_emails);exit;
        if($developermail->maildevelopergroups)
        foreach ($developermail->maildevelopergroups as $key => $cc) {
          // dd($cc->developergroups->developer);exit;
            foreach($cc->developergroups->developer as $dev){
                //dd($dev->pivot);exit;
                $cc_emails[] = $dev->pivot->email;
            }

        }
        Mail::to($cc_emails)
            ->cc($cc_emails)
           // ->send(new Developermailable($developermail));
            ->send(new Developermailable());

        return $this->createEmailLog($developermail->id,1);
    }
    private function createEmailLog($devmailId,$type,$content=null)
    {
        $email_log = new DeveloperMailLog();
        $email_log->developermail_id = $devmailId;
        $email_log->type = $type;
        return $email_log->save();
    }

    public function sendQueuedMail()
    {

        $active_mails = Developermail::whereStatus(1)->get();
        $email_count = 0;
        foreach ($active_mails as $key => $developermail) {

           // if ($developermail->checkMainEmailSend()) {

                $this->sendMainEmail($developermail);
                $email_count++;
         //   }
        }

        return $email_count . ' emails sent.';
    }
    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('developermail::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $mailtypes = MailType::all();
        $developergroups = DeveloperGroup::all();
        $developers = Developer::all();
        $developermail = Developermail::find($id);
        //dd($developermail);exit;
//        $developermail_developers = Maildevelopers::where('developermail_id', $id)->with('developers')->get()->toArray();
//        $developermail_groups = Maildevelopergroups::where('developermail_id', $id)->with('developergroups')->get()->toArray();

        $developermail_developers = $developermail->maildevelopers()->pluck('maildeveloper_id')->toArray();
        $developermail_groups =$developermail->maildevelopergroups()->pluck('maildevelopergroup_id')->toArray();
        return view('developermail::edit', compact('mailtypes', 'developergroups', 'developers','developermail','developermail_developers','developermail_groups'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Developermailrequest $request, $id)
    {
        $developermail = Developermail::find($id);
        $developermail->maildevelopers()->delete();
        $developermail->maildevelopergroups()->delete();

        $developermail->name = $request->name;
        $developermail->mailtype = $request->mailtype;
        $developermail->duration = $request->duration;
        $developermail->start_date = $request->start_date;
        $developermail->status = $request->status;
        if($request->repeat){
            $developermail->repeat = 1;
            $developermail->repeat_type = $request->repeat_type;
            if($request->repeat_type == "Custom"){
                $developermail->custom_duration = $request->custom_duration;
            }
        }else{
            $developermail->repeat = 0;
        }

        $developermail->save();

        if(!empty($request->devgroups)){
            foreach ($request->devgroups as $key => $cc) {
                $mdg = new maildevelopergroups();
                $mdg->developermail_id = $developermail->id;
                $mdg->maildevelopergroup_id = $cc;
                $mdg->save();
            }
        }

        if(!empty($request->developers)){
            foreach ($request->developers as $key => $cc) {
                $mdg = new maildevelopers();
                $mdg->developermail_id = $developermail->id;
                $mdg->maildeveloper_id = $cc;
                $mdg->save();
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $developermail = Developermail::find($id);
        $developermail->maildevelopers()->delete();
        $developermail->maildevelopergroups()->delete();
        try{
            $developermail->delete();
            return response()->json(['msg'=>'Developer Mail Removed Successfully!'], 200);
        }catch(\Exception $e){
            return response()->json(['msg'=>$e], 500);
        }


    }

    public function data($value='')
    {
        $data = Developermail::with(['mailtypes','maildevelopers.developers','maildevelopergroups.developergroups'])->get();

        return DataTables::make($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $buttons = '';

                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>';

                return $buttons;
            })
            ->addColumn('listdevelopers', function ($row) {
                $developers = [];
                foreach ($row->maildevelopers() as $key => $cc) {
                    //echo $cc;
                    $developers[] = $cc->maildevelopers()->developers()->firstname.' '.$cc->maildevelopers()->developers()->lastname;
                    //$developers[] = $cc->maildevelopers()->id;
                }


                return count($developers) > 0 ? implode(',', $developers) : '-';
                // return $row->client_cc;

            })
//            ->addColumn('listdevelopergroups', function ($row) {
//                $developergroups = [];
//                //dd($row->maildevelopergroups());exit;
//$x= sizeof($row->maildevelopergroups());exit;
//                //for($i=0; $i<(); $i++){
//                   $developergroups[] = $row->maildevelopergroups()->developergroups()->name;
//              //     $developergroups[] = $cc->maildevelopergroups()->id;
//              //  }
//
//
//                return count($developergroups) > 0 ? implode(',', $developergroups) : '-';
//                // return $row->client_cc;
//
//            })
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
