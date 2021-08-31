<?php

namespace LaravelEG\LaravelOptions\Traits;

use LaravelEG\LaravelOptions\Drivers\DatabaseDriver;
use LaravelEG\LaravelOptions\Models\LaravelEGLaravelOption;

trait HasLaravelEGOptions
{
    public function addOption($key = null, $value = null, $expiration = null)
    {
        return app('LaravelOptions')->runDriver()->put($key, $value, $expiration, $this);
    }

    public function getOption($key = null, $default = null)
    {
        return app('LaravelOptions')->runDriver()->get($key, $default, $this);
    }

    public function hasOption($key = null)
    {
        return app('LaravelOptions')->runDriver()->has($key, $this);
    }

    public function removeOption($key = null)
    {
        return app('LaravelOptions')->runDriver()->remove($key, $this);
    }

    /**
     * Get all options.
     */
    public function options()
    {
        return $this->morphMany(LaravelEGLaravelOption::class, 'model');
    }
}
