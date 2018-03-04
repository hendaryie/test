<?php


namespace App\Console\Commands;


class RepositoryInterfaceCommand extends BaseRepositoryCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'repo:repository-interface';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:repository-interface {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create repository interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'RepositoryInterface';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../Stubs/RepositoryInterface.stub';
    }
}