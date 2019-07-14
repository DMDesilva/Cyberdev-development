<?php

namespace Modules\BitbucketApi\Http\Controllers;

use App\BitbucketIssue;
use App\BitbucketRepository;
use App\BitbucketUser;
use App\BitbucketUsersIssues;
use App\BitbucketUsersRepos;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BitbucketApiController extends Controller
{
    public function bitbucketClone()
    {
        # <<<<< Start clone all owner connect with bitbucket repository and clone all repository >>>>>
        $user = new \Bitbucket\API\User();
        $user->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );
        return $user->repositories()->get()->getContent();
        #get all repositories related the user
        $repoContent = json_decode($user->repositories()->get()->getContent(), true);

        foreach ($repoContent as $owner) {

            #create all repository
            BitbucketUser::firstOrCreate([
                'username' => $owner['owner'],
            ]);

            #create all repository connected with user
            BitbucketRepository::updateOrCreate(
                ['name' => $owner['name']],
                [
                    'description' => $owner['description'],
                    'language' => $owner['language'],
                    'is_private' => $owner['is_private']
                ]
            );

        }

   
        # <<<<< End clone all owner connect with bitbucket repository and clone all repository >>>>>

        # <<<<< Start clone all team members >>>>>
        $team = new \Bitbucket\API\Teams();
        $team->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );

        $team_names = array();

        $member_teams = json_decode($team->all('member')->getContent(), true);
        foreach ($member_teams['values'] as $member_team) {
            array_push($team_names, $member_team['username']);
        }

        $contributor_teams = json_decode($team->all('contributor')->getContent(), true);
        foreach ($contributor_teams['values'] as $contributor_team) {
            array_push($team_names, $contributor_team['username']);
        }

        $admin_teams = json_decode($team->all('admin')->getContent(), true);
        foreach ($admin_teams['values'] as $admin_team) {
            array_push($team_names, $admin_team['username']);
        }

        foreach (array_unique($team_names) as $team_name) {
            $team_users = json_decode($team->members($team_name)->getContent(), true);
            foreach ($team_users['values'] as $team_user) {
                BitbucketUser::firstOrCreate([
                    'username' => $team_user['username'],
                ]);
            }

        }
        # <<<<< End clone all team members >>>>>


        $repo = new \Bitbucket\API\Repositories\Repository();
        $repo->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );

        $dashboardRepos = json_decode($user->repositories()->dashboard()->getContent(), true);

        foreach ($dashboardRepos as $dashboardRepo) {
            $user_id = BitbucketUser::select('id')->where('username', $dashboardRepo[0]['username'])->first()->id;

            foreach ($dashboardRepo[1] as $key => $dashboardReposUser) {
                $repo_id = BitbucketRepository::select('id')->where('name', $dashboardReposUser['name'])->first()->id;

                #create bitbucket user's repos
                BitbucketUsersRepos::firstOrCreate([
                    'bitbucket_users_id' => $user_id,
                    'bitbucket_repositories_id' => $repo_id,
                ]);
            }
        }

        $issue = new \Bitbucket\API\Repositories\Issues();
        $issue->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
        );
        $all_users_repos = DB::table('bitbucket_users_repos')
            ->leftJoin('bitbucket_users', 'bitbucket_users_repos.bitbucket_users_id', '=', 'bitbucket_users.id')
            ->leftJoin('bitbucket_repositories', 'bitbucket_users_repos.bitbucket_repositories_id', '=', 'bitbucket_repositories.id')
            ->select('bitbucket_users_repos.*', 'bitbucket_users.username', 'bitbucket_repositories.name as repo_name')
            ->get();

        foreach ($all_users_repos as $users_repos) {

            $issues = json_decode($issue->all($users_repos->username, $users_repos->repo_name)->getContent(), true);

            if (isset($issues['count'])) {
                if ($issues['count'] > 0) {
                    for ($i = 0; $i < $issues['count']; $i++) {
                        $issue_id = BitbucketIssue::updateOrCreate(
                            [
                                'resource_uri' => $issues['issues'][$i]['resource_uri']
                            ],
                            [
                                'status' => $issues['issues'][$i]['status'],
                                'priority' => $issues['issues'][$i]['priority'],
                                'title' => $issues['issues'][$i]['title'],
                                'content' => $issues['issues'][$i]['content'],
                                'local_id' => $issues['issues'][$i]['local_id'],
                                'reported_by' => DB::table('bitbucket_users')->where('username', $issues['issues'][$i]['reported_by']['username'])->first()->id,
                                'bitbucket_repo_id' => $users_repos->id,
                            ]);

                        #insert responsible users to bitbucket users table if not inserted in users table
                        BitbucketUser::firstOrCreate([
                            'username' => $issues['issues'][$i]['responsible']['username'],
                        ]);

                        #insert responsible users with issues
                        BitbucketUsersIssues::firstOrCreate([
                            'issues_id' => $issue_id->id,
                            'responsible' => DB::table('bitbucket_users')->where('username', $issues['issues'][$i]['responsible']['username'])->first()->id,
                        ]);
                    }
                }
            }
        }
        print_r('clone done');
    }
}
