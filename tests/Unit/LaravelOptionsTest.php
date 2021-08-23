<?php

namespace LaravelEG\LaravelOptions\Tests\Unit;

use LaravelEG\LaravelOptions\LaravelOptions;
use LaravelEG\LaravelOptions\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaravelOptionsTest extends TestCase
{
    /**
     * pass put options test.
     *
     * @return void
     */
    public function testPassOptionsPut()
    {
        $options = new LaravelOptions();
        $options_put = $options->put('name', 'karim');
        
        $this->assertEquals($options_put, 'karim');
    }

    /**
     * pass not put options test.
     *
     * @return void
     */
    public function testPassOptionsNotPut()
    {
        $options = new LaravelOptions();
        $options_put = $options->put('name');
        
        $this->assertNull($options_put);
    }

    /**
     * pass get options test.
     *
     * @return void
     */
    public function testPassOptionsGet()
    {
        $options = new LaravelOptions();
        $options->put('name', 'karim');
        $options_value = $options->get('name');
        
        $this->assertEquals($options_value, 'karim');
    }

    /**
     * pass not get options test.
     *
     * @return void
     */
    public function testPassOptionsNotGet()
    {
        $options = new LaravelOptions();
        $options->put('name', 'karim');
        $options_value = $options->get('age');
        
        $this->assertNull($options_value);
    }

    /**
     * pass has options test.
     *
     * @return void
     */
    public function testPassOptionsHas()
    {
        $options = new LaravelOptions();
        $options->put('name', 'karim');
        $options_check = $options->has('name');
        
        $this->assertTrue($options_check);
    }

    /**
     * pass not has options test.
     *
     * @return void
     */
    public function testPassOptionsNotHas()
    {
        $options = new LaravelOptions();
        $options->put('name', 'karim');
        $options_check = $options->has('age');
        
        $this->assertFalse($options_check);
    }

}
