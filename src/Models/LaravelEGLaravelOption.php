<?php

namespace LaravelEG\LaravelOptions\Models;

use Illuminate\Database\Eloquent\Model;
use Mvdnbrk\EloquentExpirable\Expirable;

class LaravelEGLaravelOption extends Model
{
    use Expirable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laraveleg_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'option_key',
        'option_value',
        'reflect_model',
        'reflect_id',
        'expires_at',
    ];

    /**
     * Get all of the options.
     */
    public function model()
    {
        return $this->morphTo();
    }
}
