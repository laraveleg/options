<?php

namespace LaravelEG\LaravelOptions;

use Illuminate\Support\Facades\Facade;

class LaravelOptionsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'LaravelOptions';
    }
}
