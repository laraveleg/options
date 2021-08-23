<?php

namespace LaravelEG\LaravelOptions\Traits;

use LaravelEG\LaravelOptions\Drivers\DatabaseDriver;

trait LaravelOptionEloquentMode
{
    public function addOption($key = null, $value = null, $expiration = null)
    {
        return app('LaravelOptions')->runDriver()->put($key, $value, $expiration, self::class, $this->id);
    }

    public function getOption($key = null, $default = null)
    {
        return app('LaravelOptions')->runDriver()->get($key, $default, self::class, $this->id);
    }

    public function hasOption($key = null)
    {
        return app('LaravelOptions')->runDriver()->has($key, self::class, $this->id);
    }

    public function removeOption($key = null)
    {
        return app('LaravelOptions')->runDriver()->remove($key, self::class, $this->id);
    }
}
