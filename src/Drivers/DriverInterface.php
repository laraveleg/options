<?php

namespace Foxlaby\LaravelOptions\Drivers;

interface DriverInterface
{
    public function __construct($prefix = '');

    public function put($key, $value = null, $expiration = null);

    public function get($key, $default = null);

    public function has($key = null);

    public function remove($key = null);
}