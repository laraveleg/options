<?php

namespace Foxlaby\LaravelOptions\Modes;

use Illuminate\Support\Facades\Cache;
use Foxlaby\LaravelOptions\Modes\ModeInterface;
use Foxlaby\LaravelOptions\Models\FoxlabyLaravelOption;

class EloquentMode implements ModeInterface
{
    private $prefix;

    public function __construct($prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function put($key, $value = null, $expiration = null, $reflect_model = null, $reflect_id = null)
    {
        if (!$value) {
            return null;
        }

        $data = [
            'option_key' => $this->prefix.$key.':'.$reflect_id,
            'option_value' => $value,
            'reflect_model' => $reflect_model,
            'reflect_id' => $reflect_id,
        ];

        if (!is_null($expiration)) {
            $data['expires_at'] = now()->addMinutes($expiration);
        }

        $option = FoxlabyLaravelOption::where('option_key', '=', $this->prefix.$key.':'.$reflect_id)->first();

        if ($option) {
            $option->option_value = $value;
            $option->save();

            return $value;
        }

        FoxlabyLaravelOption::create($data);

        return $value;
    }

    public function get($key, $default = null, $reflect_model = null, $reflect_id = null)
    {
        $option = FoxlabyLaravelOption::expiring()
            ->where('option_key', '=', $this->prefix.$key.':'.$reflect_id)
            ->where('reflect_model', '=', $reflect_model)
            ->where('reflect_id', '=', $reflect_id)
            ->first();

        if (!$option) {
            return $default;
        }

        return $option->option_value;
    }

    public function has($key = null, $reflect_model = null, $reflect_id = null)
    {
        $exists = FoxlabyLaravelOption::expiring()
            ->where('option_key', '=', $this->prefix.$key.':'.$reflect_id)
            ->where('reflect_model', '=', $reflect_model)
            ->where('reflect_id', '=', $reflect_id)
            ->exists();

        return $exists;
    }

    public function remove($key = null, $reflect_model = null, $reflect_id = null)
    {
        return FoxlabyLaravelOption::expiring()
            ->where('option_key', '=', $this->prefix.$key.':'.$reflect_id)
            ->where('reflect_model', '=', $reflect_model)
            ->where('reflect_id', '=', $reflect_id)
            ->delete();
    }
}
