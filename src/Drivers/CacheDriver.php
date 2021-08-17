<?php

namespace Foxlaby\LaravelOptions\Drivers;

use Illuminate\Support\Facades\Cache;
use Foxlaby\LaravelOptions\Drivers\DriverInterface;

class CacheDriver implements DriverInterface
{
    private $prefix;

    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function put($key, $value = null, $expiration = null)
    {
        if (!$value) {
            return null;
        }

        if (!$expiration) {
            Cache::forever($this->prefix.$key, $value);

            return $value;
        }

        Cache::put($this->prefix.$key, $value, $expiration);

        return $value;
    }

    public function get($key, $default = null)
    {
        $value = Cache::get($this->prefix.$key, $default);

        return $value;
    }

    public function has($key = null)
    {
        if (!$key) {
            return false;
        }

        return Cache::has($key);
    }

    public function remove($key = null)
    {
        if (!$key) {
            return false;
        }

        return Cache::forget($key);
    }
}
