<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Data;
use DmitryIvanov\DarkSkyApi\Weather\Alert;
use DmitryIvanov\DarkSkyApi\Weather\Flags;
use DmitryIvanov\DarkSkyApi\Weather\Headers;
use DmitryIvanov\DarkSkyApi\Weather\DataBlock;
use DmitryIvanov\DarkSkyApi\Weather\DataPoint;

class DataTest extends TestCase
{
    /** @test */
    public function it_has_the_headers_method()
    {
        $data = new Data(['dummy'], ['dummy-headers']);

        $expected = new Headers(['dummy-headers']);

        $this->assertEquals($expected, $data->headers());
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
        $data = new Data([
            'latitude' => 1.234,
            'longitude' => 5.678,
            'timezone' => 'America/New_York',
        ], ['dummy']);

        $this->assertEquals($expected, $data->{$method}());
    }

    /** @test */
    public function it_has_the_currently_method()
    {
        $data = new Data([
            'currently' => ['dummy-currently'],
        ], ['dummy']);

        $expected = new DataPoint(['dummy-currently']);

        $this->assertEquals($expected, $data->currently());
    }

    /**
     * @test
     *
     * @param  string  $method
     * @param  string  $dataKey
     * @param  array  $dataBlock
     *
     * @testWith ["minutely", "minutely", ["dummy-minutely"]]
     *           ["hourly", "hourly", ["dummy-hourly"]]
     *           ["daily", "daily", ["dummy-daily"]]
     */
    public function it_has_several_methods_which_return_different_kinds_of_data_blocks($method, $dataKey, array $dataBlock)
    {
        $data = new Data([
            $dataKey => $dataBlock,
        ], ['dummy']);

        $expected = new DataBlock($dataBlock);

        $this->assertEquals($expected, $data->{$method}());
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
    public function it_has_the_flags_method()
    {
        $data = new Data([
            'flags' => ['dummy-flags'],
        ], ['dummy']);

        $expected = new Flags(['dummy-flags']);

        $this->assertEquals($expected, $data->flags());
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
        $data = new Data(['dummy'], ['dummy']);

        $this->assertNull($data->{$method}());
    }
}
