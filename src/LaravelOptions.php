<?php

namespace Foxlaby\LaravelOptions;

use Illuminate\Support\Facades\Cache;

class LaravelOptions
{
    public function put($key, $value = null, $minutes = null)
    {
        Cache::put($key, $value, now()->addMinutes($minutes));

        return 'Put '.$key;
    }

    public function get($key, $default = null)
    {
        $value = Cache::get($key, $default);

        return $value;
    }
}