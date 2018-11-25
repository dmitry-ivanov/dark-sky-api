<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Data;
use DmitryIvanov\DarkSkyApi\Weather\Headers;

class DataTest extends TestCase
{
    /** @test */
    public function it_has_the_headers_method()
    {
        $data = new Data(['dummy'], ['dummy-headers']);

        $this->assertEquals(new Headers(['dummy-headers']), $data->headers());
    }

    /**
     * @test
     *
     * @param  string  $method
     * @param  mixed  $expected
     *
     * @testWith ["latitude", 1.23]
     *           ["longitude", 4.56]
     *           ["timezone", "America/New_York"]
     */
    public function it_has_the_methods_for_getting_the_specific_properties($method, $expected)
    {
        $data = new Data([
            'latitude' => 1.23,
            'longitude' => 4.56,
            'timezone' => 'America/New_York',
        ], ['dummy']);

        $this->assertEquals($expected, $data->{$method}());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["latitude"]
     *           ["longitude"]
     *           ["timezone"]
     */
    public function if_the_property_does_not_exist_then_null_would_be_returned($method)
    {
        $data = new Data(['dummy'], ['dummy']);

        $this->assertNull($data->{$method}());
    }
}
