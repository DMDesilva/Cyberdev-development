<?php

namespace Modules\Developer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Developer\Entities\Developer;
use Modules\Developer\Entities\DeveloperGroup;
use Modules\Developer\Http\Requests\DeveloperGroupRequest;
use Yajra\DataTables\DataTables;

class DeveloperGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $developergroups = DeveloperGroup::all();
        return view('developer::groupindex',compact( 'developergroups'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $developers = Developer::all();
        return view('developer::groupcreate', compact('developers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $developergroup = new DeveloperGroup();
        $developergroup->name = $request->name;
        $developergroup->save();
        foreach ($request->developers as $devid){
            $developer = Developer::find($devid);
            $developergroup->developer()->attach($developer);

        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('developergroup::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $developergroup = DeveloperGroup::find($id);
        $developersOfGroup = $developergroup->developer()->pluck('developer_id')->toArray();
        $developers = Developer::all();
        return view('developer::groupedit', compact('developergroup', 'developersOfGroup', 'developers'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(DeveloperGroupRequest $request, $id)
    {
        $developergroup = DeveloperGroup::find($id);
        $developergroup->name = $request->name;
        $developergroup->developer()->sync($request->developers);
        $developergroup->save();

    }

    public function destroy($id)
    {
        $developerGroup = DeveloperGroup::find($id);
        $developerGroup->developer()->detach();
        $developerGroup->delete();
        return response()->json(['msg'=>'Developer Group Removed Successfully!'], 200);

    }
    public function data()
    {
        $data = DeveloperGroup::with(['developer'])->get();
        // $data = Developer::all();
        // dd($data);exit;
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
