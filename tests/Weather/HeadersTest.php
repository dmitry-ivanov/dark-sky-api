<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Headers;

class HeadersTest extends TestCase
{
    /**
     * @test
     *
     * @param  string  $method
     * @param  array  $expected
     *
     * @testWith ["apiCalls", ["111"]]
     *           ["cacheControl", ["max-age=3600"]]
     *           ["responseTime", ["123ms"]]
     */
    public function it_has_the_methods_for_obtaining_specific_headers($method, array $expected)
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
     *
     * @param  string  $method
     *
     * @testWith ["apiCalls"]
     *           ["cacheControl"]
     *           ["responseTime"]
     */
    public function if_the_header_does_not_exist_then_an_empty_array_would_be_returned($method)
    {
        $headers = new Headers(['dummy']);

        $this->assertEquals([], $headers->{$method}());
    }

    /** @test */
    public function it_has_toArray_method()
    {
        $headers = new Headers(['dummy']);

        $this->assertEquals(['dummy'], $headers->toArray());
    }
}
