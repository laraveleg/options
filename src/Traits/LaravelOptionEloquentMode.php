<?php

namespace Foxlaby\LaravelOptions\Traits;

use Foxlaby\LaravelOptions\Drivers\DatabaseDriver;

trait LaravelOptionEloquentMode
{
    public function add_option($key = null, $value = null, $expiration = null)
    {
        return app('LaravelOptions')->runDriver()->put($key, $value, $expiration, self::class, $this->id);
    }

    public function get_option($key = null, $default = null)
    {
        return app('LaravelOptions')->runDriver()->get($key, $default, self::class, $this->id);
    }

    public function has_option($key = null)
    {
        return app('LaravelOptions')->runDriver()->has($key, self::class, $this->id);
    }

    public function remove_option($key = null)
    {
        return app('LaravelOptions')->runDriver()->remove($key, self::class, $this->id);
    }
}
