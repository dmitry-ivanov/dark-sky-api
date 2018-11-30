<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Alert;
use DmitryIvanov\DarkSkyApi\Weather\Flags;
use DmitryIvanov\DarkSkyApi\Weather\Headers;
use DmitryIvanov\DarkSkyApi\Weather\DataBlock;
use DmitryIvanov\DarkSkyApi\Weather\DataPoint;
use DmitryIvanov\DarkSkyApi\Weather\ResponseForecast;

class ResponseForecastTest extends TestCase
{
    /** @test */
    public function it_has_the_headers_method()
    {
        $response = new ResponseForecast(['dummy'], ['dummy-headers']);

        $expected = new Headers(['dummy-headers']);

        $this->assertEquals($expected, $response->headers());
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
        $response = new ResponseForecast([
            'latitude' => 1.234,
            'longitude' => 5.678,
            'timezone' => 'America/New_York',
        ], ['dummy']);

        $this->assertEquals($expected, $response->{$method}());
    }

    /** @test */
    public function it_has_the_currently_method()
    {
        $response = new ResponseForecast([
            'currently' => ['dummy-currently'],
        ], ['dummy']);

        $expected = new DataPoint(['dummy-currently']);

        $this->assertEquals($expected, $response->currently());
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
        $response = new ResponseForecast([
            'minutely' => ['dummy-minutely'],
            'hourly' => ['dummy-hourly'],
            'daily' => ['dummy-daily'],
        ], ['dummy']);

        $expected = new DataBlock($block);

        $this->assertEquals($expected, $response->{$method}());
    }

    /** @test */
    public function it_has_the_alerts_method()
    {
        $response = new ResponseForecast([
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

        $this->assertEquals($expected, $response->alerts());
    }

    /** @test */
    public function it_has_the_flags_method()
    {
        $response = new ResponseForecast([
            'flags' => ['dummy-flags'],
        ], ['dummy']);

        $expected = new Flags(['dummy-flags']);

        $this->assertEquals($expected, $response->flags());
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
        $response = new ResponseForecast(['dummy'], ['dummy']);

        $this->assertNull($response->{$method}());
    }
}
