<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Entities\Client;
use Modules\Client\Http\Requests\ClientRequest;
use DataTables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('client::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('client::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ClientRequest $request)
     {
         $client = new Client();
         $client->name = $request->full_name;
         $client->good_name = $request->good_name;
         $client->contact_no = $request->contact_no;
         $client->email = $request->email_address;
         $client->currency = $request->currency;
        $client->save();
        return response()->json(['msg'=>'Client Added Successfully!'], 200);




    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('client::edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->full_name;
        $client->good_name = $request->good_name;
        $client->contact_no = $request->contact_no;
        $client->email = $request->email_address;
        $client->currency = $request->currency;
        $client->save();

        return response()->json(['msg'=>'Client Upadated Successfully!'], 500);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return response()->json(['msg'=>'Client Removed Successfully!'], 500);
    }

   public function data()
   {
    $data = Client::all();

    return DataTables::make($data)
    ->addIndexColumn()
    ->addColumn('action', function ($row) {

        $buttons = '';
        $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>'; 
        $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>'; 

        

        return $buttons;
    })
    ->make(true);
}
}
