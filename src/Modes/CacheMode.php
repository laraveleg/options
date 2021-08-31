<?php

namespace LaravelEG\LaravelOptions\Modes;

use Illuminate\Support\Facades\Cache;
use LaravelEG\LaravelOptions\Modes\ModeInterface;

/**
 * CacheMode Class
 * 
 * This class uses the driver cache of the Laravel framework.
 */
class CacheMode implements ModeInterface
{
    /**
     * The prefix associated with the model.
     *
     * @var string
     */
    private $prefix;

    /**
     * Construct
     *
     * @return void
     */
    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    /**
     * Put method
     * 
     * Add any option to cache driver
     * 
     * @param String $key - Write a key for option
     * @param String $value - Write a value for option
     * @param String $expiration - Set expiration for the option
     * 
     * @return String $value
     */
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


    /**
     * Get method
     * 
     * Get any option from cache driver
     * 
     * @param String $key - Write a key for option
     * @param String $default - Set a default value if the option has no value
     * 
     * @return String $value
     */
    public function get($key, $default = null)
    {
        $value = Cache::get($this->prefix.$key, $default);

        return $value;
    }

    /**
     * Has method
     * 
     * Check option on driver cache
     * 
     * @param String $key - Write a key for option
     * 
     * @return Boolean
     */
    public function has($key = null)
    {
        if (!$key) {
            return false;
        }

        return Cache::has($key);
    }

    /**
     * Remove method
     * 
     * Delete option from driver cache
     * 
     * @param String $key - Write a key for option
     * 
     * @return Boolean
     */
    public function remove($key = null)
    {
        if (!$key) {
            return false;
        }

        return Cache::forget($key);
    }
}
