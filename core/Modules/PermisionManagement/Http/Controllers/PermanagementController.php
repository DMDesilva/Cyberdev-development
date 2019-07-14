<?php

namespace Modules\PermisionManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PermisionManagement\Entities\PermisionManagement;

class PermanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('permisionmanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('permisionmanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //

                   $add_payment = new PermisionManagement();

                   $add_payment->name          =  $request->full_name;
                   $add_payment->discription   =  $request->discription;
                   $add_payment->statues       =  1;
                   $add_payment->created_by    =  1;

                   $add_payment->save();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('permisionmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('permisionmanagement::edit');
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
