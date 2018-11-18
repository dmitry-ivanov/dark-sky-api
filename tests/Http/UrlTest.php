<?php

namespace Tests\Http;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class UrlTest extends TestCase
{
    /** @test */
    public function it_has_the_value_method()
    {
        $value = 'http://example.com';

        $this->assertEquals($value, (new Url($value))->value());
    }

    /** @test */
    public function it_has_the_metadata_method()
    {
        $metadata = new UrlMetadata('dummy');

        $this->assertEquals($metadata, (new Url('dummy', $metadata))->metadata());
    }
}
