<?php

namespace Modules\DeveloperMailLog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\DeveloperMailLog\Entities\DeveloperMailLog;
use Yajra\DataTables\DataTables;


class DeveloperMailLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('developermaillog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('developermaillog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('developermaillog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('developermaillog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function data()
    {
        $data = DeveloperMailLog::orderBy('id','desc')->get();

        // return ($data);

        return DataTables::make($data)
            ->addIndexColumn()
//            ->addColumn('action', function ($row) {
//
//                $buttons = '';
//
//                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="editClick(this)">Edit</button>';
//                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="'.$row->id.'" onclick="deleteClick(this)">Delete</button>';
//
//                // $buttons = '<button href="javascript:;" class="btn btn-icon-only green data-edit" title="Edit" data-id="'.$row->id.'" onclick="editClick(this)">
//                // <i class="fa fa-edit"></i>
//                // </button>';
//
//                // $buttons .= '<a href="javascript:;" class="btn btn-icon-only red data-delete" title="Delete" data-id="'.$row->id.'" onclick="deleteClick(this)"">
//                // <i class="fa fa-times"></i>
//                // </a>';
//
//                return $buttons;
//            })

            ->addColumn('developermail_name', function ($row) {
                return ($row->developermails)?$row->developermails->name:'';
            })
            ->addColumn('mail_type', function ($row) {
                return ($row->developermails->mailtypes)? ( ($row->developermails->mailtypes) ? $row->developermails->mailtypes->name:'' )  : '';
            })
            ->addColumn('developers', function ($row) {
                $cc_developers = [];

                if($row->developermails){
                    if($row->developermails->maildevelopers){
                        foreach ($row->developermails->maildevelopers as $key => $cc) {
                            $cc_developers[] = $cc->developers->name;
                        }
                    }
                }
                return implode(',', $cc_developers);
            })
            ->addColumn('developer_groups', function ($row) {
                $cc_developergroups = [];

                if($row->developermails){
                    if($row->developermails->maildevelopergroups){
//                        foreach ($row->developermails->maildevelopergroups as $key => $cc) {
//                            $cc_developergroups[] = $cc->developergroups->name;
//                        }
                        foreach ($row->developermails->maildevelopergroups as $key => $cc) {
                            // dd($cc->developergroups->developer);exit;
                            foreach($cc->developergroups->developer as $dev){
                                //dd($dev->pivot);exit;
                                $cc_emails[] = $dev->pivot->email;
                            }

                        }
                    }
                }
                return implode(',', $cc_developergroups);
                // return ($row->payment)? ( ($row->payment->client) ? $row->payment->client->name:'' )  : '';
            })

            ->addColumn('type', function ($row) {

                switch ($row->type) {
                    case 1:
                        return 'Main';
                        break;
                    case 2:
                        return 'Reminder';
                        break;
                }

            })

            ->make(true);
    }
}
