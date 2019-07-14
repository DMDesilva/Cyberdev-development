<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Modules\Dashboard\Entities\attendance_info;
use Modules\Dashboard\Entities\attendance_log_info;
use Modules\Dashboard\Entities\attendance_type;
use Modules\Dashboard\Http\Requests\attendanceRequest;
use Illuminate\Support\Facades\Auth;
use DataTable;
use App\Http\Controllers\timeController;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function new_dash(){
        return view('dashboard::index');
    }
    public function index()
    {

        $data = attendance_log_info::get()->reverse()->take(5);
        $data1 = attendance_log_info::get()->last();

        return view('dashboard::home', compact(['data','data1']));
        // $data = attendance_log_info::all();
        // return view('dashboard::index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {   
        
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {


        //return response()->json(['msg'=>'Client Added Successfully!'], 200);
        return view('dashboard::index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('dashboard::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
 
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
    public function myNotification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.','Basic');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                break;
            default:
                # code...
                break;
        }
        


        return view('my-notification');
        
    }

    public function startWork(){
        $uid=Auth::user()->id;
        $data5= new attendance_info;
        $data5 = attendance_info::where('user_id', '=', $uid)->get()->count();
        $NowTime=Carbon::now()->toDateTimeString();
        
        if($data5==0){
            $data = new attendance_info;
            $data->user_id=Auth::user()->id;
            $data->start_time=$NowTime;
            $data->save();

            $MainTableId = new attendance_info;
            $MainTableId= attendance_info::where('user_id','=',$uid)->get()->last()->id;
            
            $dataLogInfo=new attendance_log_info;
            $dataLogInfo->attendance_info_id=$MainTableId;
            $dataLogInfo->type=1;
            $dataLogInfo->time_difference=0;
            $dataLogInfo->save();


        }
        else{
                    //user chcek
        $data4= new attendance_info;
        $data4 = attendance_info::where('user_id', '=', $uid)->get()->last()->end_time;
        if($data4==null){
            echo "have to end session";
        }
        else{

            $data = new attendance_info;
            $data->user_id=Auth::user()->id;
            $data->start_time=Carbon::now()->toDateTimeString();
            $data->save();
            $MainTableId = new attendance_info;
            $MainTableId= attendance_info::where('user_id','=',$uid)->get()->last()->id;
            
            $dataLogInfo=new attendance_log_info;
            $dataLogInfo->attendance_info_id=$MainTableId;
            $dataLogInfo->type=1;
            $dataLogInfo->time_difference=0;
            $dataLogInfo->save();

            

        }

        }

         return redirect()->back();
         return view(Dashboard::home);


    }

    public function endWork(){
        
        $NowTime=Carbon::now()->toDateTimeString();
        $uid=Auth::user()->id;
        $data7= new attendance_info;
        $data7 = attendance_info::where('user_id', '=', $uid)->get()->count();
        
        if($data7==0){
          echo "no data";
        

            return redirect()->back();
            return view(Dashboard::home);
        }
        else{
            $uid=Auth::user()->id;
        $data5= new attendance_info;
        $data5 = attendance_info::where('user_id', '=', $uid)->get()->last()->start_time;
        
        if($data5==null){
            echo "have to start session";
            
        }
        else{
            $data6= new attendance_info;
            $data6 = attendance_info::where('user_id', '=', $uid)->get()->last()->end_time;

            if($data6==null){
                $NowTime = Carbon::now()->toDateTimeString() ;
                $uid = Auth::user()->id;
                $data = new attendance_info;
                $data = attendance_info::where('user_id', '=', $uid)->get()->last()->id;
                $dt=$data;
                $data = attendance_info::find($dt);
                $data->end_time=$NowTime;
                $data->save();

                //$time_difference;
                $MainTableId = new attendance_info;
                $MainTableId= attendance_info::where('user_id','=',$uid)->get()->last()->id;
                $timeInfo = new attendance_log_info;
                $timeInfo = attendance_log_info::where('attendance_info_id','=',$MainTableId)->get()->last()->type;
                $this->hours_count();
                if($timeInfo==2){
                    $dataLogInfo=new attendance_log_info;
                    $dataLogInfo->attendance_info_id=$MainTableId;
                    $dataLogInfo->type=4;
                    $dataLogInfo->time_difference=0;
                    $dataLogInfo->save();
                    $time_difference=0;
                    $this->hours_count();
                }
                elseif($timeInfo==3){
                    $getTime=new attendance_log_info;
                    $getTime=attendance_log_info::where('attendance_info_id','=',$MainTableId)->get()->last()->created_at->format('Y-m-d H:i:s');
                    
    
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $NowTime);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getTime); 
                    $diff = $to->diff($from);
                    $difDay = $diff->d;
                    $difHour = $diff->h;
                    $difMin = $diff->i;
                    $dD=$difDay*1440;
                    $dH=$difHour*60;
                    $dm=$difMin;
                    $dct=$dD+$dH+$dm;
                    $dataLogInfo=new attendance_log_info;
                    $dataLogInfo->attendance_info_id=$MainTableId;
                    $dataLogInfo->type=4;
                    $dataLogInfo->time_difference=$dct;
                    $dataLogInfo->save();
                    $this->hours_count();


                }
                elseif($timeInfo==1){
                    $getTime=new attendance_log_info;
                    $getTime=attendance_log_info::where('attendance_info_id','=',$MainTableId)->get()->last()->created_at->format('Y-m-d H:i:s');
                    
    
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $NowTime);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getTime); 
                    $diff = $to->diff($from);
                    $difDay = $diff->d;
                    $difHour = $diff->h;
                    $difMin = $diff->i;
                    $dD=$difDay*1440;
                    $dH=$difHour*60;
                    $dm=$difMin;
                    $dct=$dD+$dH+$dm;

                $dataLogInfo=new attendance_log_info;
                $dataLogInfo->attendance_info_id=$MainTableId;
                $dataLogInfo->type=4;
                $dataLogInfo->time_difference=$dct;
                $dataLogInfo->save();
                $this->hours_count();
                    
                }
               
            }
            else{
                echo "already exsists";
            }
            //code start

            return redirect()->back();
            return view(Dashboard::home);
        }
        }
        
    }

    public function pause(){

        $uid=Auth::user()->id;
        $datap1= new attendance_info;
        $datap1 = attendance_info::where('user_id', '=', $uid)->get()->count();

        
        if($datap1==0){

            echo "You didn't work early";
            
            
        }
        else{
                    $attendanceId= new attendance_info;
                    $attendanceId=attendance_info::where('user_id', '=', $uid)->get()->last()->id;
                    $datap2= new attendance_info;
                    $datap2 = attendance_info::where('user_id', '=', $uid)->get()->last()->start_time;
             if($datap2==null){
                 echo "you have to start work";
             }
             else{
                //start is exists execute here
                $datap3= new attendance_info;
                $datap3 = attendance_info::where('user_id', '=', $uid)->get()->last()->end_time;
                
                if($datap3==null){
                    //end time didnt exists code come here
                    $datap4 = new attendance_log_info;
                    $datap4 = attendance_log_info::all()->count();

                    if($datap4==0){
                        //log info table didnt exsists execute here
                        $data5 = new attendance_log_info;
                        $data5->attendance_info_id=$attendanceId;
                        $data5->type=2;
                        $data5->save();

                         return redirect()->back();
                         return view(Dashboard::home);
                    }

                    else{

                            $data6 = new attendance_log_info;
                            $data6 = attendance_log_info::where('attendance_info_id', '=', $attendanceId)->get()->count();

                            if($data6==0){
                                //attendance log count didnt exists for id
                                $data7 = new attendance_log_info;
                                $data7->attendance_info_id=$attendanceId;
                                $data7->type=2;
                                $data7->save();

                                return redirect()->back();
                                return view(Dashboard::home);
                            }
                            else{
                                $data8 = new attendance_log_info;
                                $data8 = attendance_log_info::where('attendance_info_id','=',$attendanceId)->get()->last()->type;
                                
                                if($data8==1){
                                    $MainTableId = new attendance_info;
                                    $MainTableId= attendance_info::where('user_id','=',$uid)->get()->last()->id;
                                    $NowTime = Carbon::now()->toDateTimeString() ;
                                    $getTime=new attendance_log_info;
                                    $getTime=attendance_log_info::where('attendance_info_id','=',$MainTableId)->get()->last()->created_at->format('Y-m-d H:i:s');
                                    

                                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $NowTime);
                                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getTime); 
                                    $diff = $to->diff($from);
                                    $difDay = $diff->d;
                                    $difHour = $diff->h;
                                    $difMin = $diff->i;
                                    $dD=$difDay*1440;
                                    $dH=$difHour*60;
                                    $dm=$difMin;
                                    $dct=$dD+$dH+$dm;


                                    $datae1 = new attendance_log_info;
                                    $datae1->attendance_info_id=$attendanceId;
                                    $datae1->type=2;
                                    $datae1->time_difference=$dct;
                                    $datae1->save();


                                    return redirect()->back();
                                    return view(Dashboard::home);
                                }
                                elseif($data8==2)
                                {
                                    echo "you have to continue work";
                                }
                                elseif($data8==3){
                                    $MainTableId = new attendance_info;
                                    $MainTableId= attendance_info::where('user_id','=',$uid)->get()->last()->id;
                                    $NowTime = Carbon::now()->toDateTimeString() ;
                                    $getTime=new attendance_log_info;
                                    $getTime=attendance_log_info::where('attendance_info_id','=',$MainTableId)->get()->last()->created_at->format('Y-m-d H:i:s');
                                    

                                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $NowTime);
                                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $getTime); 
                                    $diff = $to->diff($from);
                                    $difDay = $diff->d;
                                    $difHour = $diff->h;
                                    $difMin = $diff->i;
                                    $dD=$difDay*1440;
                                    $dH=$difHour*60;
                                    $dm=$difMin;
                                    $dct=$dD+$dH+$dm;

                                    $data9 = new attendance_log_info;
                                    $data9->attendance_info_id=$attendanceId;
                                    $data9->type=2;
                                    $data9->time_difference=$dct;
                                    $data9->save();

                                    return redirect()->back();
                                    return view(Dashboard::home);
                                }
                                elseif($data8==4){
                                    echo "can't stop again";
                                }
                                else{
                                    echo "wrong enter";
                                }

                            }


                    }
                    

                }
                else{
                    echo "Please start the program";
                }
             }

        }

    }
    public function continue(){
        
        $uid=Auth::user()->id;
        $datap1= new attendance_info;
        $datap1 = attendance_info::where('user_id', '=', $uid)->get()->count();
        
        
        if($datap1==0){

            echo "You didn't work early";
            
            
        }
        else{
            $attendanceId= new attendance_info;
            $attendanceId=attendance_info::where('user_id', '=', $uid)->get()->last()->id;
            $datap2= new attendance_info;
            $datap2 = attendance_info::where('user_id', '=', $uid)->get()->last()->start_time;
             if($datap2==null){
                 echo "you have to start work";
             }
             else{
                $datap3= new attendance_info;
                $datap3 = attendance_info::where('user_id', '=', $uid)->get()->last()->end_time;
                
                if($datap3==null){
                    $datap4 = new attendance_log_info;
                    $datap4 = attendance_log_info::all()->count();

                    if($datap4==0){
                        
                            echo "have to pause work";

                    }

                    else{
                            $data6 = new attendance_log_info;
                            $data6 = attendance_log_info::where('attendance_info_id', '=', $attendanceId)->get()->count();

                            if($data6==0){


                                $data7 = new attendance_log_info;
                                $data7->attendance_info_id=$attendanceId;
                                $data7->type=3;
                                $data7->time_difference=0;
                                $data7->save();
                                return redirect()->back();
                                return view(Dashboard::home);
                            }
                            else{
                                $data8 = new attendance_log_info;
                                $data8 = attendance_log_info::where('attendance_info_id','=',$attendanceId)->get()->last()->type;
                                if($data8==1){
                                    echo "you cant start";
                                }
                                elseif($data8==2)
                                {
                                    $data9 = new attendance_log_info;
                                    $data9->attendance_info_id=$attendanceId;
                                    $data9->type=3;
                                    $data9->time_difference=0;
                                    $data9->save();
                                    return redirect()->back();
                                    return view(Dashboard::home);
                                    
                                }
                                elseif($data8==3){
                                    echo "you have to pause work";
                                }
                                elseif($data8==4){
                                    echo "you cant end";
                                }
                                else{
                                    echo "wrong enter";
                                }

                            }


                    }
                    

                }
                else{
                    echo "Please start the program";
                }
             }

        }
        
    }






    public function hours_count(){
        $uid=Auth::user()->id;
        $MainTableId= new attendance_info;
        $MainTableId = attendance_info::where('user_id', '=', $uid)->get()->last()->id;
        $logType= new attendance_log_info;
        $logType= attendance_log_info::where('attendance_info_id', '=', $MainTableId)->get()->all();
        $timecal=0;

        foreach ($logType as $ty => $value) {
            $mytype = $value->type;
            $mytime= $value->time_difference;
            
            if($mytype==1){
                $timecal=$timecal+$mytime;

            }
            elseif($mytype==2){
                $timecal=$timecal+$mytime;

            }
            elseif($mytype==3){
                $timecal=$timecal+$mytime;
            }
            elseif($mytype==4){
                $timecal=$timecal+$mytime;
            }
            else{
            }
        }
        $TableAttend = new attendance_info;
        $TableAttend = attendance_info::find($MainTableId);
        $TableAttend->time=$timecal;
        $TableAttend->save();

    }



    public function work_status(attendanceRequest $request){
        $data = new attendance_info;
        $uid=Auth::user()->id;
        $data = attendance_info::where('user_id', '=', $uid)->get()->last()->note;

        if($data==null){
            $note = $request->note;
            $uid=Auth::user()->id;
            $data=new attendance_info;
            $data = attendance_info::where('user_id', '=', $uid)->get()->last()->id;
            $dt=$data;
            $data = attendance_info::find($dt);
            $data->note=$note;
            $data->save();
            return redirect()->back();
            return view(Dashboard::home);
        }
        else{
            echo "note are exsists";
        }
        
    }

    
}
