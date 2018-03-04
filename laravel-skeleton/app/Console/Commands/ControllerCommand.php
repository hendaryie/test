<?php

namespace App\Console\Commands;


class ControllerCommand extends BaseRepositoryCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'repo:controller';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create controller class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../Stubs/Controller.stub';
    }
}