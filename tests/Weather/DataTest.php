<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Data;
use DmitryIvanov\DarkSkyApi\Weather\Alert;
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
     * @testWith ["latitude", 1.234]
     *           ["longitude", 5.678]
     *           ["timezone", "America/New_York"]
     */
    public function it_has_the_methods_for_getting_the_specific_properties($method, $expected)
    {
        $data = new Data([
            'latitude' => 1.234,
            'longitude' => 5.678,
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

    /** @test */
    public function it_has_the_alerts_method()
    {
        $data = new Data([
            'alerts' => [
                $alert1 = ['dummy-alert-1'],
                $alert2 = ['dummy-alert-2'],
                $alert3 = ['dummy-alert-3'],
            ],
        ], ['dummy']);

        $expected = [
            new Alert($alert1),
            new Alert($alert2),
            new Alert($alert3),
        ];

        $this->assertEquals($expected, $data->alerts());
    }

    /** @test */
    public function the_alerts_method_returns_null_if_there_is_no_alerts_data()
    {
        $data = new Data(['dummy'], ['dummy']);

        $this->assertNull($data->alerts());
    }
}
