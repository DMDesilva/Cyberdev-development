<?php

namespace Modules\Position\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Position\Entities\Post;
use Modules\Position\Http\Requests\PositionRequest;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('position::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('position::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PositionRequest $request)
    {
        $position = new Post();
        $position->name = $request->name;
        $position->description = $request->description;
        $position->amount = $request->amount;
        try{
            $position->save();
            return response()->json(['msg'=>'Position Added Successfully!'], 200);

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
        return view('position::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $position = Post::find($id);
        return view('position::edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(PositionRequest $request, $id)
    {
        $position = Post::find($id);
        $position->name = $request->name;
        $position->description = $request->description;
        $position->amount = $request->amount;

        try{
            $position->save();
            return response()->json(['msg'=>'Position Updated Successfully!'], 200);

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
        Post::find($id)->delete();
        return response()->json(['msg'=>'Position Removed Successfully!'], 200);
    }

    public function data(){
        $data = Post::all();
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
