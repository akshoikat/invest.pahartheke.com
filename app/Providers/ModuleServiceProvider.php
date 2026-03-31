<?php

namespace App\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         $filesystem = new Filesystem(); // ✅ Correct way to use Filesystem

        $modulesPath = app_path('Modules');

        if ($filesystem->exists($modulesPath)) {
            $modules = $filesystem->directories($modulesPath);

            foreach ($modules as $modulePath) {
                $webRoutes = $modulePath . '/Routes/web.php';

                if ($filesystem->exists($webRoutes)) {
                    Route::middleware('web')
                        ->group(function () use ($webRoutes) {
                            require $webRoutes;
                        });
                }
            }
        }
    }
}
