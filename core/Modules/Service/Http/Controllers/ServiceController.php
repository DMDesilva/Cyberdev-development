<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Service\Entities\Service;
use DataTables;
use Modules\Service\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('service::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('service::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->name = $request->service_name;
        $service->service_type = $request->service_type;
        $service->due_percentage = $request->due_percentage;
        $service->description = $request->description;
        $service->save();

        return response()->json(['msg'=>'Service Added Successfully!'], 200);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('service::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('service::edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($id);
        $service->name = $request->service_name;
        $service->service_type = $request->service_type;
        $service->due_percentage = $request->due_percentage;
        $service->description = $request->description;
        $service->save();

        return response()->json(['msg'=>'Service Updated Successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
         Service::find($id)->delete();
        return response()->json(['msg'=>'Service Removed Successfully!'], 200);
    }

    public function data()
    {
        $data = Service::all();

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
