<?php

namespace Modules\DeveloperPayment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\DeveloperPayment\Entities\Reason;
use Modules\Developer\Entities\Developer;
use Modules\DeveloperPayment\Entities\reason_type;
use Modules\DeveloperPayment\Http\Requests\genPayment_req;
use Modules\DeveloperPayment\Entities\Genarate_payment;

class DeveloperPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
       
        $reason = Reason::all();
        $developer = Developer::all();
        // $reason_type = reason_type::where('id','=',$id)->get()->last();
        

           $abc = Genarate_payment::where('payment_statues', 0)->get()->last()->id;

           $arr = Genarate_payment::where('id', $abc)->get()->last()->developers;

           $decod=json_decode($arr);
           
          $arrlist = Developer::whereIn('id',$decod)->get();

          return view ('developerpayment::index',compact('reason','developer','arrlist'));

        // foreach($decod as $value )
        // {



        // }
        



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
        //
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
