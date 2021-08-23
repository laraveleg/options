<?php

namespace LaravelEG\LaravelOptions;

use LaravelEG\LaravelOptions\Modes\CacheMode;
use LaravelEG\LaravelOptions\Modes\EloquentMode;

class LaravelOptions
{
    public $modes = [
        'cache' => CacheMode::class,
        'eloquent' => EloquentMode::class,
    ];

    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function runDriver()
    {        
        if (config('laraveloptions.eloquent_mode')) {
            return new $this->modes['eloquent']($this->prefix);
        }

        return new $this->modes['cache']($this->prefix);
    }
}
