<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateRepositoryCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'repo:create';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a CRUD interface: Controller, Model, Request';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = ucfirst($this->argument('name'));

        // Create the Controller and show output
        Artisan::call('repo:controller', ['name' => $name]);
        echo Artisan::output();

        // Create the Repository and show output
        Artisan::call('repo:repository', ['name' => $name]);
        echo Artisan::output();

        // Create the Repository Interface and show output
        Artisan::call('repo:repository-interface', ['name' => $name]);
        echo Artisan::output();

        // Create the Service and show output
        Artisan::call('repo:service', ['name' => $name]);
        echo Artisan::output();

        // Create the Service Interface and show output
        Artisan::call('repo:service-interface', ['name' => $name]);
        echo Artisan::output();

    }
}