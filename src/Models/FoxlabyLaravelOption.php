<?php

namespace Foxlaby\LaravelOptions\Models;

use Illuminate\Database\Eloquent\Model;
use Mvdnbrk\EloquentExpirable\Expirable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoxlabyLaravelOption extends Model
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
