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
        $headers = ['dummy-headers'];

        $this->assertEquals(new Headers($headers), (new Data(['dummy'], $headers))->headers());
    }
}
