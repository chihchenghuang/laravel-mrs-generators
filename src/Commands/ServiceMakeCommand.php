<?php

namespace ChihCheng\MRSGenerators\Commands;

use Illuminate\Console\GeneratorCommand;

class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    protected $type = 'Service';


    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)->replaceRepository($stub, $name)->replaceClass($stub, $name);
    }

    protected function replaceRepository(&$stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);
        $model = str_replace( 'Service','Repository',$class );

        $stub = str_replace(
            ['DummyRepository','DummyInstanceRepository'],
            [$model,lcfirst($model)],
            $stub
        );

        return $this;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }
}
