<?php

namespace Modules\DeveloperPayment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\DeveloperPayment\Entities\Reason;
use Modules\Developer\Entities\Developer;
use Modules\DeveloperPayment\Entities\Genarate_payment;
use Modules\DeveloperPayment\Entities\reason_type;
use Modules\DeveloperPayment\Http\Requests\genPayment_req;
use DB;

class GenaratemodelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // $reason = Reason::all();
        // $developer = Developer::all();

        // $gen_payment = new Genarate_payment();
        // $abc = Genarate_payment::where('payment_statues', 0)->get()->last()->id;

        // dd($abc);
        // echo $abc;

      //  return view ('developerpayment::index',compact('reason','developer'));







       
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('developerpayment::create');


    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response



     */
    public function store(Request $request)
    {
      
        $gen_payment = new Genarate_payment();


        $arr = array($request->developers);
        $as  = json_encode($request->developers);
                       
                                                                // //dd($as); 
                                                                // //echo $as;
        //                                                      // //echo json_encode($arr)."\n";
        $gen_payment->developers      = $as;
        $gen_payment->reson_id        = $request->reason_value;
        $tmkin = $request->reason_value;
        $tmk = Reason::where('id','=',$tmkin)->get()->last()->reason_type;
                                                             // //echo $tmk;
        $gen_payment->reason_type     = $tmk;
        $gen_payment->reson_note      = $request->other_reson;
        $gen_payment->payment_statues  = 0;

        
        //                                       //  $abc = Genarate_payment::get()->last()->id;
        //                                       //  $bcf = Genarate_payment::where('id','=',$abc)->get()->last()->ref_number;
        $abc = Genarate_payment::get()->last()->id;
        //                                       //  $abc = Genarate_payment::where('payment_statues', 0)->get()->last()->id;
        $bcs = ('CT-0000000000' . (intval($abc) + 1));
        //                                      //  $autoin = $bcf + 1;

        $gen_payment->ref_number = $bcs;
        //                                      // //echo $autoin;

         $gen_payment->save();

         return back();
       
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('developerpayment::show');

        
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('developerpayment::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
