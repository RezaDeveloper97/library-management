<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeCQRS extends Command
{
    protected $signature = 'make:cqrs {name}';
    protected $description = 'Generate CQRS structure for a given model (Command, Handler, Query, Repository)';

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
            'Commands' => 'Command',
            'Handlers' => 'Handler',
            'Queries' => 'Query',
            'Repositories' => 'Repository',
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
        $createAssignments = implode("\n        ", array_map(fn($field) => "\$command->$field = \$$field;", $fillable));

        $updateParams = implode(', ', array_map(fn($field) => "\$$field = null", $fillable));
        $updateAssignments = implode("\n        ", array_map(fn($field) => "if (!is_null(\$$field)) {\n            \$command->$field = \$$field;\n        }", $fillable));

        return <<<EOT
    public static function create($createParams)
    {
        \$command = new self();
        $createAssignments

        return \$command;
    }

    public static function update(\$id, $updateParams)
    {
        \$command = new self();
        \$command->id = \$id;
        $updateAssignments

        return \$command;
    }

    public static function delete(\$id)
    {
        \$command = new self();
        \$command->id = \$id;

        return \$command;
    }
EOT;
    }

    protected function generateHandlerMethods($fillable, $name)
    {
        $createAssignments = implode(",\n            ", array_map(fn($field) => "'$field' => \$command->$field", $fillable));
        $updateAssignments = implode("\n        ", array_map(fn($field) => "if (!is_null(\$command->$field)) {\n            \$model->$field = \$command->$field;\n        }", $fillable));

        return <<<EOT
    public function create({$name}Command \$command)
    {
        return $name::create([
            $createAssignments
        ]);
    }

    public function update({$name}Command \$command)
    {
        \$model = $name::findOrFail(\$command->id);

        $updateAssignments

        \$model->save();

        return \$model;
    }

    public function delete({$name}Command \$command)
    {
        \$model = $name::findOrFail(\$command->id);
        \$model->delete();

        return \$model;
    }
EOT;
    }
}
