<?php

if (!function_exists('add_option')) {
    function add_option($key = null, $value = null, $minutes = null)
    {
        return app('LaravelOptions')->put($key, $value, $minutes);
    }
}


if (!function_exists('get_option')) {
    function get_option($key = null, $default = null)
    {
        return app('LaravelOptions')->get($key, $default);
    }
}

if (!function_exists('has_option')) {
    function has_option($key = null)
    {
        return app('LaravelOptions')->has($key);
    }
}

if (!function_exists('remove_option')) {
    function remove_option($key = null)
    {
        return app('LaravelOptions')->remove($key);
    }
}