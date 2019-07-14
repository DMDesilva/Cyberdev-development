<?php

namespace Modules\Deadline\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Deadline\Entities\Deadline;
use Modules\Deadline\Http\Requests\DeadRequest;
use DataTables;


class DeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
         return view('deadline::index');


        // // $deadlines = table('deadline')->get();

        // return view('deadline.index', ['deadlines' => $deadlines]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('deadline::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $deadline = new Deadline();
        $deadline->task_id = $request->task_id;
        $deadline->task_url = $request->task_url;
        $deadline->assign_hourse = $request->assign_hourse;
       
        $deadline->save();

        return response()->json(['msg'=>'Deadline Added Successfully!'], 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('deadline::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $deadline = Deadline::find($id);
        return view('deadline::edit',compact('deadline'));

         
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
         $deadline = Deadline::find($id);
        $deadline->task_id = $request->task_id;
        $deadline->task_url= $request->task_url;
        $deadline->assign_hourse = $request->assign_hourse;
        
        $deadline->save();

        return response()->json(['msg'=>'Deadline Upadated Successfully!'], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    // public function destroy($id)
    // {
    //     //
    // }


     public function destroy($id)
    {
        Deadline::find($id)->delete();
        return response()->json(['msg'=>'Deadline Removed Successfully!'], 200);
}


  public function data()
   {
    $data = Deadline::all();

 return DataTables::make($data)
 ->addIndexColumn()
 ->addColumn('action', function ($row) {

     $buttons = '';

     $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>'; 
     $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>'; 
   

     // $buttons = '<button href="javascript:;" class="btn btn-icon-only green data-edit" title="Edit" data-id="'.$row->id.'" onclick="editClick(this)">
     // <i class="fa fa-edit"></i>
     // </button>';

     // $buttons .= '<a href="javascript:;" class="btn btn-icon-only red data-delete" title="Delete" data-id="'.$row->id.'" onclick="deleteClick(this)"">
     // <i class="fa fa-times"></i>
     // </a>';

     return $buttons;
 })
 ->make(true);
}
}
