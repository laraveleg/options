<?php

namespace Foxlaby\LaravelOptions;

use Illuminate\Support\Facades\Cache;

class LaravelOptions
{
    private $prefix;

    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function put($key, $value = null, $minutes = null)
    {
        if (!$value) {
            return null;
        }

        Cache::put($this->prefix.$key, $value, now()->addMinutes($minutes));

        return $value;
    }

    public function get($key, $default = null)
    {
        $value = Cache::get($this->prefix.$key, $default);

        return $value;
    }

    public function has($key)
    {
        return Cache::has($key);
    }
}