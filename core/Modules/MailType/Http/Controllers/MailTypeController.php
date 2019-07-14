<?php

namespace Modules\MailType\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MailType\Entities\MailType;
use Modules\MailType\Http\Requests\MailTypeRequest;
use Yajra\DataTables\DataTables;
class MailTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('mailtype::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('mailtype::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(MailTypeRequest $request)
    {
        $mailtype = new MailType();
        $mailtype->name = $request->name;
        $mailtype->description = $request->description;
        try{
            $mailtype->save();
            return response()->json(['msg'=>'Mail Type Added Successfully!'], 200);

        }catch (\Exception $e){
            return response()->json(['msg'=>$e], 500);
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('mailtype::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $mailtype = MailType::find($id);
        return view('mailtype::edit', compact('mailtype'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(MailTypeRequest $request, $id)
    {
        $mailtype = MailType::find($id);
        $mailtype->name = $request->name;
        $mailtype->description = $request->description;

        try{
            $mailtype->save();
            return response()->json(['msg'=>'Mail Type Updated Successfully!'], 200);

        }catch (\Exception $e){
            return response()->json(['msg'=>$e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        MailType::find($id)->delete();
        return response()->json(['msg'=>'Mail Type Removed Successfully!'], 200);

    }

    public function data(){
        $data = MailType::all();
        return DataTables::make($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $buttons = '';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>';
                return $buttons;
            })
            ->make(true);
    }
}
