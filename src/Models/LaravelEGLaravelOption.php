<?php

namespace LaravelEG\LaravelOptions\Models;

use Illuminate\Database\Eloquent\Model;
use Mvdnbrk\EloquentExpirable\Expirable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaravelEGLaravelOption extends Model
{
    use HasFactory;
    use Expirable;

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
}
