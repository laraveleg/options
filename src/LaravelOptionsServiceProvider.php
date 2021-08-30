<?php

namespace LaravelEG\LaravelOptions;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use LaravelEG\LaravelOptions\Models\LaravelEGLaravelOption;

class LaravelOptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('laraveloptions.eloquent_mode')) {
            LaravelEGLaravelOption::onlyExpired()->delete();
        }

        $this->mergeConfigFrom(__DIR__ . '/../config/laraveloptions.php', 'laraveloptions');

        $this->publishConfig();
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
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laraveloptions.php' => config_path('laraveloptions.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations/2021_08_17_113422_laraveleg_option_table.php' => database_path('migrations/2021_08_17_113422_laraveleg_option_table.php'),
            ], 'migrations');
        }
    }
}
