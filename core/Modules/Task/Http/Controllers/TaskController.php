<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\Type;
use Modules\Task\Entities\Status;
use Modules\Task\Entities\Priority;
use Modules\Task\Entities\Bitbucket_repositories;
use Modules\Task\Http\Requests\TaskRequest;
use Modules\Task\Http\Requests\EditTaskRequest;
use Illuminate\Support\Facades\Auth; 

use DataTables;
use Response;






class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()    {
       return view('task::index');

  }

        // $issues_types =Type::all();
        // return $issues_types;
        
        // $data = Task::all();
        // $type = Type::all();
        // return view('task::index', compact('data','type')); 
        // $issues_type = Issues_type::all()->toArray();
        // return view('task.create',compact(issues_type));

       
    // public function getSize()
    //  {
    //      return $this->hasMany('Modules\BitbucketApi\Database\Migrations','bitbucket_repo_id',id);
    //  }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
          $issues_types =Type::all();
          $issues_status=Status::all();
         $task_priorities=Priority::all();
         $bitbucket_repositories=Bitbucket_repositories::all();
         
         return view('task::create', compact('issues_types','issues_status','task_priorities','bitbucket_repositories')); 


        
       }
        
        
         
    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function store(TaskRequest $request)
    {

         $task = new Task();
         $task->title=$request->title;
		 $task->content=$request->description;
		 $task->reported_by=$request->reported_by;
         $task->type = $request->get('type');   
		 $task->status=$request->get('status');
		 $task->resource_uri=$request->get('Resource_url');
         $task->priority=$request->get('priority');
		 $date=$request->get('bday');
		 $time=$request->get('usr_time');
		 $datetime = $date . ' ' . $time;
		 $task->deadline=$datetime;
		 $task->hours=$request->get('hours');
         $task->bitbucket_repo_id=$request->get('bitbucket_repo_id');
		 $rp = Auth::user()->id;
		 $task->reported_by = $rp;
         $task->save();
         return response()->json(['msg'=>'Task Added Successfully!'], 400);
   
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */



    public function show()
    {
        return view('task::show');
    }
       



 


    public function edit($id)
    {
        $task =Task::find($id);
        $issues_types =Type::all();
        $issues_status=Status::all();
        $task_priorities=Priority::all();
        $bitbucket_repositories=Bitbucket_repositories::all();
        return view('task::edit',compact('issues_types','issues_status','task_priorities','bitbucket_repositories','task'));

    }



/**
  *  public function getData()
   * {
    *     return $data = Task::get();
    *}
*/

 


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */







    public function update(EditTaskRequest $request)
    {
         $id= $request->id;
         $task = Task::find($id);
         $task->title = $request->title;
         $task->content = $request->description;
         $task->type = $request->type;
         $task->status = $request->status;
         $task->priority = $request->priority;
         $date=$request->get('bday');
         $time=$request->get('usr_time');
         $datetime = $date . ' ' . $time;
         $task->deadline = $datetime;
         $task->hours = $request->hours;
         $task->save();
        return response()->json(['msg'=>'Task Added Successfully!'], 400);

    }


    


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return response()->json(['msg'=>'Task Removed Successfully!'], 200);
	}


	public function data()
	{
       
       $data = Task::with(['gettype','getstatus','getpriority'])->get();

    return DataTables::make($data)
	 ->addIndexColumn()
	 ->addColumn('action', function ($row) {

		 $buttons = '';
         $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editclick3(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>';
		 $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editclick3(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'; 
		 $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'; 
		 $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="assignClick(this)"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>'; 

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
        
        public function test(){
            
            $data = Task::with(['gettype','getstatus','getpriority'])->get();
            $id=1;
            $main_array=array();
            foreach ($data as $key => $value) {
              
              $sub_arry=array();
              array_push($sub_arry, $value->id);
              array_push($sub_arry, $value->title);
              array_push($sub_arry, $value->gettype->name);
              array_push($sub_arry, $value->getstatus->name);
              array_push($sub_arry, $value->getpriority->name);
              array_push($sub_arry, '<button type="button" class="btn btn-default btn-sm" data-id="10" onclick="editclick3(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>');
              array_push($sub_arry, '<button type="button" class="btn btn-default btn-sm" data-id="10" onclick="editclick3(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>');
              array_push($sub_arry, '<button type="button" class="btn btn-default btn-sm" data-id="10" onclick="deleteClick(this)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>');
              array_push($sub_arry, '<button type="button" class="btn btn-default btn-sm" data-id="10" onclick="assignClick(this)"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>');
              array_push($main_array, $sub_arry);
              array_push($main_array, $sub_arry);
              $id=$id+1;
            
            
        }
        
        return Response::json(array('data'=>$main_array));

        
        



}


}

