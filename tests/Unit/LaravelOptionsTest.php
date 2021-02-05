<?php

namespace Foxlaby\LaravelOptions\Tests\Unit;

use Foxlaby\LaravelOptions\LaravelOptions;
use Foxlaby\LaravelOptions\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaravelOptionsTest extends TestCase
{
    /**
     * A options put test example.
     *
     * @return void
     */
    public function testOptionsPut()
    {
        $options = new LaravelOptions();
        $options_put = $options->put('name', 'karim');
        
        $this->assertEquals($options_put, 'Put name');
    }


    /**
     * A options put test example.
     *
     * @return void
     */
    public function testOptionsGet()
    {
        $options = new LaravelOptions();
        $options->put('name', 'karim');
        $options_value = $options->get('name');
        
        $this->assertEquals($options_value, 'karim');
    }
}
