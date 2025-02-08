<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeCQRS extends Command
{
    protected $signature = 'make:cqrs {name}';
    protected $description = 'Generate CQRS structure for a given model (DTO, Handler, Query, Repository, Service)';

    public function handle()
    {
        $name = $this->argument('name');
        $modelPath = app_path("Models/{$name}.php");

        if (!File::exists($modelPath)) {
            $this->error("Model '{$name}' does not exist. Please create it first.");
            return;
        }

        $fillable = $this->getFillableFields($name);

        $folders = [
            'DTOs' => 'DTO',
            'Handlers' => 'Handler',
            'Queries' => 'Query',
            'Repositories' => 'Repository',
            'Services' => 'Service',
        ];

        foreach ($folders as $folder => $stub) {
            $this->createFile($folder, $stub, $name, $fillable);
        }

        $this->info("CQRS structure for '{$name}' created successfully.");
    }

    protected function createFile($folder, $stub, $name, $fillable = [])
    {
        $filePath = app_path("{$folder}/{$name}{$stub}.php");
        $stubFileName = strtolower($stub);
        $stubPath = base_path("stubs/cqrs/{$stubFileName}.stub");

        if (!File::exists($stubPath)) {
            $this->error("Stub not found: {$stubPath}");
            return;
        }

        if (File::exists($filePath)) {
            $this->warn("File already exists: {$filePath}");
            return;
        }

        $content = File::get($stubPath);

        $content = str_replace('{{ name }}', $name, $content);

        if ($folder === 'Handlers') {
            $content = str_replace('{{ handler_methods }}', $this->generateHandlerMethods($fillable, $name), $content);
        }

        $content = str_replace('{{ properties }}', $this->generateProperties($fillable), $content);
        $content = str_replace('{{ methods }}', $this->generateMethods($fillable), $content);

        File::ensureDirectoryExists(app_path($folder));
        File::put($filePath, $content);

        $this->info("Created: {$filePath}");
    }

    protected function getFillableFields($name)
    {
        $modelClass = "App\\Models\\{$name}";
        if (!class_exists($modelClass)) {
            $this->error("Model class '{$modelClass}' does not exist.");
            return [];
        }

        $model = new $modelClass();
        return $model->getFillable();
    }

    protected function generateProperties($fillable)
    {
        $properties = array_map(fn($field) => "    public \$$field;", $fillable);
        return implode("\n", array_merge(['    public $id;'], $properties));
    }

    protected function generateMethods($fillable)
    {
        $createParams = implode(', ', array_map(fn($field) => "\$$field", $fillable));
        $createAssignments = implode("\n        ", array_map(fn($field) => "\$dto->$field = \$$field;", $fillable));

        $updateParams = implode(', ', array_map(fn($field) => "\$$field = null", $fillable));
        $updateAssignments = implode("\n        ", array_map(fn($field) => "if (!is_null(\$$field)) {\n            \$dto->$field = \$$field;\n        }", $fillable));

        return <<<EOT
    public static function create($createParams)
    {
        \$dto = new self();
        $createAssignments

        return \$dto;
    }

    public static function update(\$id, $updateParams)
    {
        \$dto = new self();
        \$dto->id = \$id;
        $updateAssignments

        return \$dto;
    }

    public static function delete(\$id)
    {
        \$dto = new self();
        \$dto->id = \$id;

        return \$dto;
    }
EOT;
    }

    protected function generateHandlerMethods($fillable, $name)
    {
        $createAssignments = implode(",\n            ", array_map(fn($field) => "'$field' => \$dto->$field", $fillable));
        $updateAssignments = implode("\n        ", array_map(fn($field) => "if (!is_null(\$dto->$field)) {\n            \$model->$field = \$dto->$field;\n        }", $fillable));

        return <<<EOT
    public function create({$name}DTO \$dto)
    {
        \$model = $name::query()->create([
            $createAssignments
        ]);

        \$model->setCacheData();

        return \$model;
    }

    public function update({$name}DTO \$dto)
    {
        \$model = $name::query()->find(\$dto->id);

        $updateAssignments

        \$model->save();

        \$model->setCacheData();

        return \$model;
    }

    public function delete({$name}DTO \$dto)
    {
        \$model = $name::query()->find(\$dto->id);

        \$model->clearCache();

        \$model->delete();

        return \$model;
    }
EOT;
    }
}
