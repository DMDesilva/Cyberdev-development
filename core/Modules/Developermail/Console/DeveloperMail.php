<?php

namespace Modules\Developermail\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeveloperMail extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'registered:developers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends emails to the developers and developer groups';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //return (redirect('send-queued-developer-emails'));
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
           // ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
