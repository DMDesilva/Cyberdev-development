<?php

namespace Modules\BitbucketApi\Http\Controllers;

use App\BitbucketRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bitbucketapi::index')->with(['repositories' => BitbucketRepository::all()]);
    }


       // one to many
        public function edit($id)
        {
            return $bitbucket_repo_id = bitbucket_repo_id::with(['getSize'])->find($id);
            return $bitbucket_repo_id ->getSize();
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bitbucketapi::create_repository');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
//            'description' => 'required',
//            'language' => 'required',
            'is_private' => 'required'
        ]);

        $repo = new \Bitbucket\API\Repositories\Repository();
        $repo->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );


        $repo_slug = strtolower($request->name);
        $repo_slug = preg_replace("/[\\s_]/", "-", $repo_slug);

        $is_private = true;
        if ($request->is_private == 0){
            $is_private = false;
        }

        $repo_create = $repo->create($repo_slug, array(
            'description' => $request->description,
            'language' => $request->language,
            'is_private' => $is_private
        ));

        $repo = json_decode($repo_create->getContent(), true);

        if (isset($repo['name'][0]['message'])) {
            return back()->with('msg', 'You already have a repository with this name.');
        } else {
            if ($this->cloneRepositories()) {
                return back()->with('msg', 'Repository Created Successful.');
            } else {
                return back()->with('msg', 'Clone Error.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repository = BitbucketRepository::find($id);
        return $repository;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = new \Bitbucket\API\User();
        $user->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );
        $profile = json_decode($user->get()->getContent(), true);
        $account_name = $profile['user']['username'];


        $repo = new \Bitbucket\API\Repositories\Repository();
        $repo->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );


        $repo_slug = strtolower($request->name);
        $repo_slug = preg_replace("/[\\s_]/", "-", $repo_slug);

        $repo_update = $repo->update($account_name, $repo_slug, array(
            'description' => $request->description,
            'language' => $request->language,
            'is_private' => $request->is_private
        ));

        if ($this->cloneRepositories()) {
            return back()->with('msg', 'Repository Deleted Successful.');
        } else {
            return back()->with('msg', 'Clone Error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new \Bitbucket\API\User();
        $user->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );
        $profile = json_decode($user->get()->getContent(), true);
        $account_name = $profile['user']['username'];

        $repo = new \Bitbucket\API\Repositories\Repository();
        $repo->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );

        $repo_slug = BitbucketRepository::find($id)->name;

        $repo_slug = strtolower($repo_slug);
        $repo_slug = preg_replace("/[\\s_]/", "-", $repo_slug);

        $delete_repo_bitbucket = $repo->delete($account_name, $repo_slug);

        //soft delete in local db
        $repository = BitbucketRepository::find($id);
        $repository->delete();

        if ($delete_repo_bitbucket->getContent() == '') {
            return back()->with('msg', 'Repository Delete Error. ');
        } else {
            if ($this->cloneRepositories()) {
                return back()->with('msg', 'Repository Deleted Successful.');
            } else {
                return back()->with('msg', 'Clone Error.');
            }
        }
    }

    public function cloneRepositories()
    {
        $user = new \Bitbucket\API\User();
        $user->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );
        #get all repositories related the user
        $repositories = json_decode($user->repositories()->get()->getContent(), true);

        foreach ($repositories as $repository) {
            #create or update all repository connected with user

            BitbucketRepository::updateOrCreate(
                ['name' => $repository['name']],
                [
                    'description' => $repository['description'],
                    'language' => $repository['language'],
                    'is_private' => $repository['is_private']
                ]
            );
        }
        return true;
    }
}


