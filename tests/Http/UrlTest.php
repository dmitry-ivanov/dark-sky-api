<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;
use DmitryIvanov\DarkSkyApi\Tests\TestCase;

class UrlTest extends TestCase
{
    /** @test */
    public function it_has_the_value_method()
    {
        $url = new Url('http://example.com');

        $this->assertEquals('http://example.com', $url->value());
    }

    /** @test */
    public function it_has_the_metadata_method()
    {
        $url = new Url('dummy', new UrlMetadata('dummy'));

        $expected = new UrlMetadata('dummy');

        $this->assertEquals($expected, $url->metadata());
    }
}
