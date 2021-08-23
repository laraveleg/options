<?php

namespace LaravelEG\LaravelOptions\Modes;

interface ModeInterface
{
    public function __construct($prefix = '');

    public function put($key, $value = null, $expiration = null);

    public function get($key, $default = null);

    public function has($key = null);

    public function remove($key = null);
}
