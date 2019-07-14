<?php

namespace Modules\Project\Http\Controllers;

use App\BitbucketRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Entities\Client;
use Modules\Developer\Entities\Developer;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectClients;
use Modules\Project\Http\Requests\ProjectRequest;
use Modules\VcrService\Entities\VcrService;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $clients = Client::all();
        $vcr_services = VcrService::all();
        $repositories = BitbucketRepository::all();
        $developers = Developer::all();
        return view('project::index')->with(['clients' => $clients, 'vcr_services' => $vcr_services, 'repositories' => $repositories, 'developers' => $developers]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
//        $clients = Client::all();
//        return view('project::create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProjectRequest $request)
    {
        dd($request->all());
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->domain = $request->domain;
        $project->approved_date = $request->approved_date;
        $project->dev_start_date = $request->dev_start_date;
        $project->amount = $request->amount;
        $project->save();

        $project_id = $project->id;
        foreach ($request->clients as $clientid) {
//            $client = Client::find($id);
//            $project->projectclients()->attach($client);
            $projectClient = new ProjectClients();
            $projectClient->project_id = $project_id;
            $projectClient->client_id = $clientid;
            $projectClient->save();
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $projectClients = $project->projectclients()->pluck('client_id')->toArray();
        $clients = Client::all();
        return view('project::edit', compact('project', 'projectClients', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     */
    public function update(ProjectRequest $request, $id)
    {

        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->domain = $request->domain;
        $project->approved_date = $request->approved_date;
        $project->dev_start_date = $request->dev_start_date;
        $project->amount = $request->amount;
        $project->projectclients()->delete();
        $project->save();

        //ProjectClients::where('project_id',$id)
        foreach ($request->clients as $clientid) {
            $projectClient = new ProjectClients();
            $projectClient->project_id = $id;
            $projectClient->client_id = $clientid;
            $projectClient->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        ProjectClients::where('project_id', $id)->delete();
        return response()->json(['msg' => 'Project Removed Successfully!'], 200);
    }

    public function data()
    {
        $data = Project::with(['projectclients.client'])->get();

        return DataTables::make($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $buttons = '';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="' . $row->id . '" onclick="editClick(this)">Edit</button>';
                $buttons .= '<button type="button" class="btn btn-default btn-sm" data-id="' . $row->id . '" onclick="deleteClick(this)">Delete</button>';
                return $buttons;
            })
            ->make(true);
    }

    public function removeClient(Project $project, $id)
    {
        $client = Client::find($id);

        $project->projectclients()->detach($client);

        return 'Success';
    }
}
