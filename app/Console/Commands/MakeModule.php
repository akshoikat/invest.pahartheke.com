<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Create a new module with basic folder structure and default controller';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $viewNamespace = strtolower($name);
        $basePath = app_path("Modules/{$name}");

        $folders = [
            'Http/Controllers',
            'Routes',
            'Models',
            'Migrations',
            'Seeders',
        ];

        foreach ($folders as $folder) {
            $path = "{$basePath}/{$folder}";
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
                $this->info("Created: {$path}");
            }
        }

        // Create default Controller
        $controllerClass = "{$name}Controller";
        $controllerPath = "{$basePath}/Http/Controllers/{$controllerClass}.php";

        if (!file_exists($controllerPath)) {
            $namespace = "App\\Modules\\{$name}\\Http\\Controllers";
            $controllerContent = <<<PHP
            <?php

            namespace {$namespace};

            use App\Http\Controllers\Controller;

            class {$controllerClass} extends Controller
            {
                public function index()
                {
                    return view('{$viewNamespace}::index');
                }
            }
            PHP;
            file_put_contents($controllerPath, $controllerContent);
            $this->info("Created: {$controllerPath}");
        }

        // Create routes/web.php
        $routePath = "{$basePath}/Routes/web.php";
        if (!file_exists($routePath)) {
            $routeContent = <<<PHP
                <?php

                use Illuminate\\Support\\Facades\\Route;
                use App\\Modules\\{$name}\\Http\\Controllers\\{$controllerClass};

                Route::prefix(strtolower('{$name}'))->middleware(['web', 'auth'])->group(function () {
                    Route::get('/', [{$controllerClass}::class, 'index'])->name('{$name}.index');
                });
                PHP;
            file_put_contents($routePath, $routeContent);
            $this->info("Created: {$routePath}");
        }

        // Create default Blade view
        $viewPath = resource_path("modules/{$viewNamespace}");
        if (!is_dir($viewPath)) {
            mkdir($viewPath, 0755, true);
            $this->info("Created view folder: {$viewPath}");
        }

        $bladePath = "{$viewPath}/index.blade.php";
        if (!file_exists($bladePath)) {
            $bladeContent = <<<BLADE
            @extends('layouts.app')

            @section('content')
            <div class="container">
                <h1>{{ ucfirst('{$name}') }} Dashboard</h1>
            </div>
            @endsection
            BLADE;
            file_put_contents($bladePath, $bladeContent);
            $this->info("Created Blade view: {$bladePath}");
        }

        $this->info("✅ Module '{$name}' created with controller, route, and view.");
    }


    private function getViewNamespace($name)
    {
        return strtolower($name);
    }
}
