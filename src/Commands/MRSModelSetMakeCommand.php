<?php

namespace ChihCheng\MRSGenerators\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class MRSModelSetMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:mrs-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new classes based on Model-Repository-Service Patern set';

    protected $type = 'MRS-Model-Set';


    public function fire()
    {
        $this->createModel();
        $this->createRepository();
        $this->createService();
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createModel()
    {
        $model = Str::studly(class_basename($this->argument('name')));
        $this->call('make:model', [
            'name' => "Models/{$model}",
        ]);
    }

    protected function createRepository()
    {
        $model = Str::studly(class_basename($this->argument('name')));
        $this->call('make:repository', [
            'name' => "Repositories/{$model}Repository",
        ]);
    }

    protected function createService()
    {
        $model = Str::studly(class_basename($this->argument('name')));
        $this->call('make:service', [
            'name' => "Services/{$model}Service",
        ]);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/repository.stub';
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
