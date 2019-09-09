<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http;

use DmitryIvanov\DarkSkyApi\Http\Request;
use DmitryIvanov\DarkSkyApi\Tests\TestCase;

class RequestTest extends TestCase
{
    /** @test */
    public function it_has_the_id_method()
    {
        $request = new Request('dummy', 'dummy', '123');

        $this->assertEquals('123', $request->id());
    }

    /** @test */
    public function it_has_the_url_method()
    {
        $request = new Request('http://example.com', 'dummy');

        $this->assertEquals('http://example.com', $request->url());
    }

    /** @test */
    public function it_has_the_query_method()
    {
        $request = new Request('dummy', 'lang=ru');

        $this->assertEquals('lang=ru', $request->query());
    }
}
