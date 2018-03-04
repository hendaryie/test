<?php

namespace App\Console\Commands;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

abstract class BaseRepositoryCommand extends GeneratorCommand
{
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
        $className = $this->getClassName($name);

        return $this->laravel['path'] . '/' . str_replace('\\', '/', $name) . '/' . $className . $this->type . '.php';
    }

    /**
     * Parse the name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function parseName($name)
    {
        $rootNamespace = $this->laravel->getNamespace();

        $name = str_replace('/', '\\', $name);

        if (starts_with($name, $rootNamespace)) {
            return $name;
        }
        return $this->parseName($this->getDefaultNamespace(trim($rootNamespace, '\\')).$name);
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
        return $rootNamespace . '\Domain';
    }

    /**
     * Replace the table name for the given stub.
     *
     * @param string $stub
     * @param string $name
     *
     * @return string
     */
    protected function replaceNameStrings(&$stub, $name)
    {

        $pluralClassName = str_plural($this->getClassName($name));
        $variableName = lcfirst($this->getClassName($name));
        $pluralVariableName = str_plural($variableName);
        $coreNamespace = $this->getCoreNamespace();

        $stub = str_replace('DummyClasses', $pluralClassName, $stub);
        $stub = str_replace('dummy_class', $variableName, $stub);
        $stub = str_replace('dummy_classes', $pluralVariableName, $stub);
        $stub = str_replace('DummyCoreNamespace', $coreNamespace, $stub);

        return $this;
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)->replaceNameStrings($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Get the full namespace name for a given class.
     *
     * @param  string  $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return $name;
    }

    /**
     * Get the class name from name.
     *
     * @param  string  $name
     * @return string
     */
    protected function getClassName($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $name), -1, 1)), '\\');
    }

    /**
     * Get the class name from name.
     *
     * @param  string  $name
     * @return string
     */
    protected function getCoreNamespace()
    {
        return $this->laravel->getNamespace() . 'Domain\Core';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = $this->getClassName($name);

        return str_replace('DummyClass', $class, $stub);
    }
}