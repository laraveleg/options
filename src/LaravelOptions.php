<?php

namespace Foxlaby\LaravelOptions;

use Foxlaby\LaravelOptions\Drivers\CacheDriver;

class LaravelOptions
{
    public $drivers = [
        'cache' => CacheDriver::class,
    ];

    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function runDriver()
    {
        return new $this->drivers['cache'];
    }
}
