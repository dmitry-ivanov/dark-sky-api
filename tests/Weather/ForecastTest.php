<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Weather;

use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Alert;
use DmitryIvanov\DarkSkyApi\Weather\DataBlock;
use DmitryIvanov\DarkSkyApi\Weather\DataPoint;
use DmitryIvanov\DarkSkyApi\Weather\Flags;
use DmitryIvanov\DarkSkyApi\Weather\Forecast;
use DmitryIvanov\DarkSkyApi\Weather\Headers;

class ForecastTest extends TestCase
{
    /** @test */
    public function it_has_the_headers_method()
    {
        $forecast = new Forecast(['dummy'], ['dummy-headers']);

        $expected = new Headers(['dummy-headers']);

        $this->assertEquals($expected, $forecast->headers());
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
    public function it_has_the_methods_for_obtaining_specific_properties($method, $expected)
    {
        $forecast = new Forecast([
            'latitude' => 1.234,
            'longitude' => 5.678,
            'timezone' => 'America/New_York',
        ], ['dummy']);

        $this->assertEquals($expected, $forecast->{$method}());
    }

    /** @test */
    public function it_has_the_currently_method()
    {
        $forecast = new Forecast([
            'currently' => ['dummy-currently'],
        ], ['dummy']);

        $expected = new DataPoint(['dummy-currently']);

        $this->assertEquals($expected, $forecast->currently());
    }

    /**
     * @test
     *
     * @param  string  $method
     * @param  array  $block
     *
     * @testWith ["minutely", ["dummy-minutely"]]
     *           ["hourly", ["dummy-hourly"]]
     *           ["daily", ["dummy-daily"]]
     */
    public function it_has_several_methods_which_return_different_kinds_of_data_blocks($method, array $block)
    {
        $forecast = new Forecast([
            'minutely' => ['dummy-minutely'],
            'hourly' => ['dummy-hourly'],
            'daily' => ['dummy-daily'],
        ], ['dummy']);

        $expected = new DataBlock($block);

        $this->assertEquals($expected, $forecast->{$method}());
    }

    /** @test */
    public function it_has_the_alerts_method()
    {
        $forecast = new Forecast([
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

        $this->assertEquals($expected, $forecast->alerts());
    }

    /** @test */
    public function it_has_the_flags_method()
    {
        $forecast = new Forecast([
            'flags' => ['dummy-flags'],
        ], ['dummy']);

        $expected = new Flags(['dummy-flags']);

        $this->assertEquals($expected, $forecast->flags());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["latitude"]
     *           ["longitude"]
     *           ["timezone"]
     *           ["currently"]
     *           ["minutely"]
     *           ["hourly"]
     *           ["daily"]
     *           ["alerts"]
     *           ["flags"]
     */
    public function if_there_is_no_underlying_data_for_the_proper_method_then_null_would_be_returned($method)
    {
        $forecast = new Forecast(['dummy'], ['dummy']);

        $this->assertNull($forecast->{$method}());
    }

    /** @test */
    public function it_has_toArray_method()
    {
        $forecast = new Forecast(['dummy-response'], ['dummy-headers']);

        $this->assertEquals(['dummy-response'], $forecast->toArray());
    }
}
