<?php

namespace Modules\Developer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Developer\Entities\Developer;
use Modules\Developer\Entities\DeveloperWorkingDays;
use Modules\Developer\Http\Requests\DeveloperRequest;
use Modules\Position\Entities\Post;
use Yajra\DataTables\DataTables;


class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('developer::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $positions=  Post::all();
        
        return view('developer::create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(DeveloperRequest $request)
    {
        $developer = new Developer();
        $developer->firstname = $request->firstname;
        $developer->lastname = $request->lastname;
        $developer->position = $request->position;
        $developer->mobile = $request->mobile;
        $developer->home = $request->home;
        $developer->email = $request->email;
        $developer->address = $request->address;
        $developer->work_type = $request->work_type;
        $developer->status = $request->status;
        $developer->bitbucket_user=$request->bitbucket_user;
        $developer->hourly_rate=$request->houlry_rate;
        $developer->register_date=$request->register_date;
        try{
            $developer->save();
          //  $i=1;

            foreach ($request->w_days as $w_days){
            //for($i=1; $i<8; $i++){
               // if($request->w_days.''.$i){
                    $workingday = new DeveloperWorkingDays();
                    $workingday->developer_id = $developer->id;
                    $workingday->days = $w_days;
                    $i=$w_days;
                    $workingday->starttime = $request->starttime[$i];
                    $workingday->endtime = $request->endtime[$i];
                    $workingday->save();
               // }
            }
            return response()->json(['msg'=>'Developer Added Successfully!'], 200);

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
        return view('developer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $developer = Developer::find($id);
        $positions= Post::all();

        $workingdays = $developer->workingdays()->pluck('days')->toArray();
        $starttimes = $developer->workingdays()->pluck('starttime','days')->toArray();
        $endtimes = $developer->workingdays()->pluck('endtime', 'days')->toArray();
        return view('developer::edit', compact(['developer','positions','workingdays','starttimes', 'endtimes']));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(DeveloperRequest $request, $id)
    {
        $developer = Developer::find($id);
        $developer->workingdays()->delete();

        $developer->firstname = $request->firstname;
        $developer->lastname = $request->lastname;
        $developer->position = $request->position;
        $developer->mobile = $request->mobile;
        $developer->home = $request->home;
        $developer->email = $request->email;
        $developer->address = $request->address;
        $developer->work_type = $request->work_type;
        $developer->status = $request->status;
        $developer->bitbucket_user=$request->bitbucket_user;
        $developer->hourly_rate=$request->houlry_rate;
        $developer->register_date=$request->register_date;

        try{
            $developer->save();
            foreach ($request->w_days as $wday){
                $workingday = new DeveloperWorkingDays();
                $workingday->developer_id = $id;
                $workingday->days = $wday;
                $i=$wday;
                $workingday->starttime = $request->starttime[$i];
                $workingday->endtime = $request->endtime[$i];
                $workingday->save();
            }
            return response()->json(['msg'=>'Developer Updated Successfully!'], 200);

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
        $developer = Developer::find($id);
        $developer->workingdays()->delete();
        $developer->delete();
        return response()->json(['msg'=>'Developer Removed Successfully!'], 200);

    }

    public function data(){
        $data = Developer::with(['position'])->get();
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

    public function changeStatus($id){
        $developer = Developer::find($id);
        $developer->status = !($developer->status);

        try{
            $developer->save();
            return response()->json(['msg'=>'Developer Updated Successfully!'], 200);

        }catch (\Exception $e){
            return response()->json(['msg'=>$e], 500);
        }
//        return redirect()
    }
}
