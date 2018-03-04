<?php


namespace App\Console\Commands;


class ServiceCommand extends BaseRepositoryCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'repo:service';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create service class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../Stubs/Service.stub';
    }
}