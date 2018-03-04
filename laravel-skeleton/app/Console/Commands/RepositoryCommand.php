<?php

namespace App\Console\Commands;


class RepositoryCommand extends BaseRepositoryCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'repo:repository';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../Stubs/Repository.stub';
    }
}