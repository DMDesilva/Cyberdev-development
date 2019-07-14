<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use App\TimeInfoFile;
use App\TimeAInfoFile;
use Illuminate\Support\Facades\Auth;

class timeController extends Controller
{
    //
  		// $uid=Auth::user()->id;
    //     $datas= new TimeInfoFile;
    public function abc(){

     //    $now_difference_time;
    	// $uid=Auth::user()->id;
    	// $datas = new TimeInfoFile;
    	// $datas = TimeInfoFile::where('user_id', '=', $uid)->get()->last();
    	// $u_startData = $datas->start_time;
    	// $u_start = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$u_startData)->format('H:i:s');
     //    $datas = TimeInfoFile::where('user_id', '=', $uid)->get()->last();
     //    $u_endData = $datas->end_time;
     //    $u_end= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$u_endData)->format('H:i:s');
    	// $uid=Auth::user()->id;
    	// $datas = new TimeAInfoFile;
    	// $dmt = TimeInfoFile::where('user_id', '=', $uid)->get()->last()->id;

        
     //    $start_time = new TimeInfoFile;
     //    $start_time = TimeInfoFile::where('user_id', '=', $uid)->get()->last()->start_time;
     //    $start_time_count = new TimeInfoFile;
     //    $start_time_count = TimeInfoFile::where('user_id', '=', $uid)->get()->last()->count()->start_time;
     //    $end_time = new TimeInfoFile;
     //    $end_time = TimeInfoFile::where('user_id', '=', $uid)->get()->last()->end_time;
     //    $end_time_count = new TimeInfoFile;
     //    $end_time_count = TimeInfoFile::where('user_id', '=', $uid)->get()->last()->count()->end_time;
     //    if(empty($start_time_count=="0")){
     //        echo "sorry no start";
     //    }
     //    else{
     //        if($end_time_count==0){
     //            $datas = new TimeAInfoFile;
     //            $datas = TimeAInfoFile::where("attendance_info_id", '=', $dmt)->get()->count();
     //            if($datas==0){
     //                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $end_time);
     //                $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $start_time);
     //                $diff_in_hours = $to->diff($from);
     //                echo $start_time;
     //                echo $end_time;
     //                echo $diff_in_hours->h;
     //                echo " : ";
     //                echo $diff_in_hours->i;
     //                echo " : ";
     //                echo $diff_in_hours->s;
     //                echo "<br>";
     //                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
     //            }
     //            else{
     //                $datas = new TimeAInfoFile;
     //                $datas = TimeAInfoFile::where("attendance_info_id",'=',$dmt)->get()->type->created_at;
     //                $count=0;
     //                foreach ($datas as $data => $value) {
     //                    if($count=0){
     //                        if($value->type==pause){
     //                            $pause_time=$value->created_at;
     //                            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $pause_time);
     //                            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $start_time);
     //                            $diff_in_hours = $to->diff($from);
     //                            $now_difference_time = diff_in_hours;

     //                        }
     //                        else{
     //                            //nothing happen
     //                        }
     //                    }
     //                    else{
     //                        if($)
     //                    }
                       
     //                }
     //            }


     //        }
     //        else{
     //            $datas = new TimeAInfoFile;
     //            $datas = TimeAInfoFile::where("attendance_info_id", '=', $dmt)->get();

     //            if(!empty($datas)){
     //                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
     //                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $start_time);
     //                $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $end_time);
     //                $diff_in_hours = $to->diff($from);
     //                echo $start_time;
     //                echo $end_time;
     //                echo $diff_in_hours->h;
     //                echo " : ";
     //                echo $diff_in_hours->i;
     //                echo " : ";
     //                echo $diff_in_hours->s;
     //                echo "<br>";
     //                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
     //            }
     //            else{
     //                $datas = new TimeAInfoFile;
     //                $datas = TimeAInfoFile::where("attendance_info_id",'=',$dmt)->get();
     //                echo $datas;
     //                //$i=0;
     //                foreach ($datas as $data => $value) {
     //                    echo "hi";
     //                    // if(i==0){
     //                    //     echo "here";
     //                    //     echo $value;
     //                    // }
     //                    // else{
     //                    //     echo "now";
     //                    //     echo "<br>";
     //                    //     echo $value;
     //                    //     echo "<br>";
     //                    // }
     //                    // $i=$i+1;
     //                }
     //            }
     //        }
     //    }
        // $datas = new TimeAInfoFile;
        // $datas = TimeAInfoFile::where('attendance_info_id', '=', $dmt)->get();
        // $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $u_startData);
        // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $u_endData);

        // foreach ($datas as $data => $value) {


            
        
        
        //echo $to;
        //echo $from;
        // $diff_in_hours = $to->diff($from);
        // echo $diff_in_hours->h;
        // echo "<br>";
        // echo $diff_in_hours->i;
        // echo "<br>";
        // echo $diff_in_hours->s;
        // echo "<br>";
        // print_r($diff_in_hours);

        // foreach ($datas as $data => $value) {

        //     $types=$value->type;
        //     if ($value->type==2) {
        //         // $getTimes=[$value->created_at];


        //         // // =$value->created_at;
        //         // // echo $getTimes[];
        //     } else if ($value->type==3){
        //         $types2=$value->type;
        //     }
        //     else{
        //             echo 'no';
        //     }

        }
        



    	// foreach ($datas as $data => $value) {
    	//  $i=$value->start_time;
    	// 	$date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value->start_time)->format('H:i:s');
    	// 	echo $date;
    	// 	echo "<br>";
    	// }
    	
 	

	
}
