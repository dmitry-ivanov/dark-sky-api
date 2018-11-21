<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Headers;

class HeadersTest extends TestCase
{
    /** @test */
    public function it_has_the_all_method()
    {
        $this->assertEquals(['dummy'], (new Headers(['dummy']))->all());
    }

    /**
     * @test
     * @param  string  $method
     * @param  array  $expected
     *
     * @testWith ["cacheControl", ["max-age=3600"]]
     *           ["forecastApiCalls", ["111"]]
     *           ["responseTime", ["123ms"]]
     */
    public function it_has_the_methods_for_getting_the_specific_headers($method, array $expected)
    {
        $headers = new Headers([
            'Cache-Control' => ['max-age=3600'],
            'X-Forecast-API-Calls' => ['111'],
            'X-Response-Time' => ['123ms'],
        ]);

        $this->assertEquals($expected, $headers->{$method}());
    }

    /**
     * @test
     * @param  string  $method
     *
     * @testWith ["cacheControl"]
     *           ["forecastApiCalls"]
     *           ["responseTime"]
     */
    public function if_the_header_does_not_exist_then_an_empty_array_would_be_returned($method)
    {
        $this->assertEquals([], (new Headers(['dummy']))->{$method}());
    }
}
