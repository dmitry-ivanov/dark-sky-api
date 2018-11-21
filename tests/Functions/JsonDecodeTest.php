<?php

namespace Tests\Functions;

use Tests\TestCase;
use InvalidArgumentException;

class JsonDecodeTest extends TestCase
{
    /** @test */
    public function it_decodes_the_valid_json()
    {
        $json = '{"valid":"json"}';

        $this->assertEquals(['valid' => 'json'], \DmitryIvanov\DarkSkyApi\json_decode($json, true));
    }

    /** @test */
    public function it_throws_an_exception_if_invalid_json_passed()
    {
        $this->isExpectingException(new InvalidArgumentException('[json_decode] error: Syntax error.'));

        \DmitryIvanov\DarkSkyApi\json_decode($invalidJson = 'Something wrong!');
    }
}
