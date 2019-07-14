<?php

namespace Modules\EmailLog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\EmailLog\Entities\EmailLog;
use DataTables;
class EmailLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('emaillog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('emaillog::create');
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
        return view('emaillog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('emaillog::edit');
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
        $data = EmailLog::orderBy('id','desc')->get();

        // return ($data);

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

        ->addColumn('payment_no', function ($row) {
            return ($row->payment)?$row->payment->payment_no:'';
        })
        ->addColumn('client', function ($row) {
            return ($row->payment)? ( ($row->payment->client) ? $row->payment->client->name:'' )  : '';
        })
        ->addColumn('client_cc', function ($row) {
            $cc_clients = [];

            if($row->payment){
                foreach ($row->payment->client_cc as $key => $cc) {
                    $cc_clients[] = $cc->client->name;
                }
            }
            return implode(',', $cc_clients);
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


    //       return count($cc_clients) > 0 ? implode(',', $cc_clients) : '-';
    //  // return $row->client_cc;

    //   })
    //     ->editColumn('repeat', function ($row) {

    //       switch ($row->repeat) {
    //         case 0:
    //         return 'No Repeat';
    //         break;

    //         case 1:
    //         return 'Repeat';
    //         break;
    //     }

    // })
      //   ->editColumn('repeat_type', function ($row) {

      //      if($row->repeat_type == 'Custom'){
      //         return 'Custom' . '(' . $row->custom_duration . ' days)';
      //     }else{
      //         return $row->repeat_type;
      //     }
      // })
        ->make(true);
    }
}
