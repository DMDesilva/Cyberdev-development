<?php

namespace Modules\RoleManagement\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\RoleManagement\Entities\RoleManagement;
use Modules\PermisionManagement\Entities\PermisionManagement;
use Modules\RoleManagement\Entities\Permision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\PermisionManagement\Entities\UserRolManag;

use DataTables;
use response;

class RoleManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('rolemanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $rol = PermisionManagement::all();
        return view('rolemanagement::create',compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //

                        $add_role = new RoleManagement();

                   $add_role->name          = $request->full_name;

                  // $arr                     = array($request->permition);
                   $as                      = json_encode($request->permition);
                   $add_role->permition     = $as;
                   $add_role->created_by    = Auth::id();

                   $add_role->save();
                   return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('rolemanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
       // return view('rolemanagement::edit');

        $add_role     = RoleManagement::find($id);
        $rol          = PermisionManagement::all();



        return view('rolemanagement::edit', compact('add_role','rol')); 
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request ,$id)
    {
        //
     //dd($request->all());
                $id= $request->id;
                $upd_role                =  RoleManagement::find($id);
                $upd_role->name          =  $request->input('full_name');

                $as                      = json_encode($request->permition);
                $upd_role->permition     =  $as;


                   $upd_role->save();
                   return back();



    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        RoleManagement::find($id)->delete();

        return response()->json(['msg'=>'Position Removed Successfully!'], 200);
        
    }
//     public function data()
//    {
//     $data = RoleManagement::all();

//     return DataTables::make($data)
//     ->addIndexColumn()
//     ->addColumn('action', function ($row) {

//         $buttons = '';
//         $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editclick3(this)">Edit</button>'; 
//         $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick2(this)">Delete</button>'; 

        

//         return $buttons;
//     })
//     ->make(true);
// }


    public function tableview(){


  $data = RoleManagement::with('roles')->get();

       return Datatables::of($data)

        ->addIndexColumn()
        ->addColumn('action', function($row){
                $buttons = '';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>';
                return $buttons;
            })

        //  ->addColumn('permitionlist', function ($row) {
        //     $roles = [];

        //      foreach (json_decode($row->permition) as $key => $cc) {

        // $cc = PermisionManagement::find($cc);

        //      return $roles[] = $cc;
        //     }

        //     return print_r($roles);

        //       // print_r($roles);

        //     return count($roles) > 0 ? implode(',', $roles) : '-';
        //      // return $row->roles;

        //   })
           
        
       ->make(true);
      }

}
