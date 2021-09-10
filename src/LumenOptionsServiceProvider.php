<?php

namespace LaravelEG\LaravelOptions;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use LaravelEG\LaravelOptions\Models\LaravelEGLaravelOption;
use LaravelEG\LaravelOptions\Console\Commands\RemoveOptionsCommand;

class LumenOptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RemoveOptionsCommand::class,
            ]);
        }

        if (config('laraveloptions.eloquent_mode')) {
            LaravelEGLaravelOption::onlyExpired()->delete();
        }

        $this->mergeConfigFrom(__DIR__ . '/../config/laraveloptions.php', 'laraveloptions');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('LaravelOptions', function () {
            return new LaravelOptions;
        });

        $this->app->register(\Mvdnbrk\EloquentExpirable\ExpirableServiceProvider::class);
    }
}
