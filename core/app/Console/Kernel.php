<?php

namespace App\Console;

use App\BitbucketUser;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'Modules\Developermail\Console\DeveloperMail',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $user = new \Bitbucket\API\User();
            $user->getClient()->addListener(
                new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
            );

            $repoContent =json_decode($user->repositories()->get()->getContent(), true);

            foreach ($repoContent as $owner){

                try{

//                    $bitbucket_repo = new BitbucketRepository();

                    $bitbucket_user = new BitbucketUser();
                    $bitbucket_user->username = $owner['owner'];
                    $bitbucket_user->is_private = $owner['is_private'];
                    $bitbucket_user->repo_name = $owner['name'];
                    $bitbucket_user->save();
                }

                catch (QueryException $e) {
                    continue;
                }
            }
        })->everyMinute();


        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
