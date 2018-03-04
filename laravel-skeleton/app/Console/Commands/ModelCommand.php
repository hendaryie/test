<?php


namespace App\Console\Commands;


use Illuminate\Support\Facades\Artisan;


class ModelCommand extends BaseRepositoryCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'repo:model';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../Stubs/Model.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getPath($name)
    {
        $name = str_replace($this->laravel->getNamespace(), '', $name);

        return $this->laravel['path'] . '/' . str_replace('\\', '/', $name) . '.php';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Domain\Core\Models\\';
    }

    /**
     * Get the full namespace name for a given class.
     *
     * @param  string $name
     * @return string
     */
    protected function getNamespace($name)
    {
        $class = $this->getClassName($name);
        $name = str_replace('\\' . $class, '', $name);

        return $name;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = $this->getClassName($name);
        $table = str_plural(snake_case(class_basename($class)));

        $this->createMigration($table);

        return str_replace('DummyClass', $class, $stub);
    }

    /**
     * Create table migration file using 'php artisan make:migration'.
     *
     * @param  string $name
     * @return string
     */
    private function createMigration($name)
    {
        $name = strtolower($name);

        //Create the migration from model
        Artisan::call('make:migration', ['name' => "create_{$name}_table", '--create' => $name]);
        echo Artisan::output();
    }

}