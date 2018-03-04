<?php

namespace App\Console\Commands;


class ServiceInterfaceCommand extends BaseRepositoryCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'repo:service-interface';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:service-interface {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create service interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ServiceInterface';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../Stubs/ServiceInterface.stub';
    }
}