<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Assign;
use Modules\Task\Entities\Task;
use Modules\Developer\Entities\Developer;
use Modules\Task\Http\Requests\FormAssignRequest;
use Modules\Task\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth; 

use DataTables;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('task::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
      
          return view('task::create',compact('developers')); 
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {       
        // $m = $request->description;
        // return $m;
             $assign = new Assign();
             $assign->description=$request->description;             
             $assign->user_assign = $request->get('user_assign');
            
              
             $assign->save();
            return "Assign Task success!!!!!!!!!";

         
        
        
    }
    public function assign_insert(Request $request){
        // return $request->description;
        // return $request->user_assign;

            $assign = new Assign();
            $assign->description=$request->description;
            $assign->user_assign = $request->user_assign;
            $assign->task_id = $request->tskId;
            $assign->deadline = $request->tskdeadline;
            $assign->assigned_by = Auth::user()->id;
            $uid = $request->user_assign;
            $DeveloperRate = new Developer;
            $DeveloperRate = Developer :: where('id','=',$uid)->get()->last()->hourly_rate;
            $tid = $request->tskId;
            $TaskHours = New Task;
            $TaskHours = Task :: where('id','=',$tid)->get()->last()->hours;
            $EstimatePay= $DeveloperRate * $TaskHours;
            $assign->est_amount = $EstimatePay;
            $assign->save();
            
                
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('task::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('task::edit');
    }
    public function assign_show(Request $request)
    {
        $id = $request->all();
        $tmk = Task::where('id','=',$id)->get()->last();
        $developers=Developer::all();
        return view('task::assign',compact('tmk', 'developers'));
        // return view('task::assign');
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
