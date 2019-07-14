<?php

namespace Modules\PermisionManagement\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PermisionManagement\Entities\PermisionManagement;
use Modules\PermisionManagement\Entities\Userpermition;
use Modules\PermisionManagement\Entities\Permision;

use DataTables;
use response;


class PermisionManagementController extends Controller
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

      //  dd("HI");

                   $add_payment = new PermisionManagement();

                   $add_payment->name          =  $request->full_name;
                   $add_payment->discription   =  $request->discription;
                   $add_payment->statues       =  1;
                   $add_payment->created_by    =  Auth::id();

                   $add_payment->save();
                   return back();

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
    // {
    //     return view('permisionmanagement::edit');
    // }
    {
        //dd($id);
        $add_payment =PermisionManagement::find($id);
        return view('permisionmanagement::edit', compact('add_payment'));    }

    /**

dd($id);
        // $edit_permision = new PermisionManagement;
        return $edit_permision = PermisionManagement::find($id);
        return view('permisionmanagement::edit', compact('edit_permision'));

     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //

        //dd($request->all());
        // return $id;->input('discription');
                $id= $request->id;
                $add_payment                =  PermisionManagement::find($id);
                $add_payment->name          =  $request->input('full_name');
                $add_payment->discription   =  $request->input('discription');


                   $add_payment->save();
                   return back();



        // $id= $request->id;
        //  $task = Task::find($id);
        //  $task->title = $request->title;
        //  $task->content = $request->description;
        //  $task->type = $request->type;
        //  $task->status = $request->status;
        //  $task->priority = $request->priority;
        //  $date=$request->get('bday');
        //  $time=$request->get('usr_time');
        //  $datetime = $date . ' ' . $time;
        //  $task->deadline = $datetime;
        //  $task->hours = $request->hours;
        //  $task->save();
        // return response()->json(['msg'=>'Task Added Successfully!'], 400);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
public function tableview2(){


$data = PermisionManagement::with('roles')->get();

     return Datatables::of($data)

        ->addIndexColumn()
        ->addColumn('action', function($row){
                $buttons = '';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>';
                return $buttons;
            })
           
        
       ->make(true);
      }


    public function destroy($id)
    {
        //
        PermisionManagement::find($id)->delete();
        return response()->json(['msg'=>'Position Removed Successfully!'], 200);
    }
}

   //  public function data()
   // {
    // $data = PermisionManagement::all();

    // return DataTables::make($data)
    // ->addIndexColumn()
    // ->addColumn('action', function ($row) {

    //     $buttons = '';
    //     $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editclick3(this)">Edit</button>'; 
    //     $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>'; 

        

    //     return $buttons;
    // })
    // ->make(true);
//}

