<?php

namespace LaravelEG\LaravelOptions\Modes;

use Illuminate\Support\Facades\Cache;
use LaravelEG\LaravelOptions\Modes\ModeInterface;
use LaravelEG\LaravelOptions\Models\LaravelEGLaravelOption;

/**
 * EloquentMode Class
 * 
 * This class uses the eloquent for add option to model.
 */
class EloquentMode implements ModeInterface
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
     * Add an option to the options table for the model
     * 
     * @param String $key - Write a key for option
     * @param String $value - Write a value for option
     * @param String $expiration - Set expiration for the option
     * @param object $model - The object from the model that uses the trait `HasLaravelEGOptions`
     * 
     * @return String $value
     */
    public function put($key, $value = null, $expiration = null, $model = null)
    {
        if (!$value) {
            return null;
        }

        $data = [
            'option_key' => $this->prefix.$key.':'.$model->id,
            'option_value' => $value,
        ];

        if (!is_null($expiration)) {
            $data['expires_at'] = now()->addMinutes($expiration);
        }

        $option = LaravelEGLaravelOption::where('option_key', '=', $this->prefix.$key.':'.$model->id)->first();

        if ($option) {
            $option->option_value = $value;
            $option->save();

            return $value;
        }

        $model->morphMany(LaravelEGLaravelOption::class, 'model')->create($data);

        return $value;
    }

    /**
     * Get method
     * 
     * Get an option from the options table for the model
     * 
     * @param String $key - Write a key for option
     * @param String $default - Set a default value if the option has no value
     * @param object $model - The object from the model who uses the trait `HasLaravelEGOptions`
     * 
     * @return String $value
     */
    public function get($key, $default = null, $model = null)
    {
        $option = $model->options()
            ->withoutExpired()
            ->first();

        if (!$option) {
            return $default;
        }

        return $option->option_value;
    }

    /**
     * Has method
     * 
     * Check option on the options table for the model
     * 
     * @param String $key - Write a key for option
     * @param object $model - The object from the model who uses the trait `HasLaravelEGOptions`
     * 
     * @return Boolean
     */
    public function has($key = null, $model = null)
    {
        return $model->options()
            ->withoutExpired()
            ->where('option_key', '=', $key.':'.$model->id)
            ->exists();
    }

    /**
     * Remove method
     * 
     * Delete option from the options table for the model
     * 
     * @param String $key - Write a key for option
     * @param object $model - The object from the model who uses the trait `HasLaravelEGOptions`
     * 
     * @return Boolean
     */
    public function remove($key = null, $model = null)
    {
        return $model->options()
            ->withoutExpired()
            ->where('option_key', '=', $key.':'.$model->id)
            ->delete();
    }
}
