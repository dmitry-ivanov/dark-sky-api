<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Parameters;

use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Parameters\Blocks;

class BlocksTest extends TestCase
{
    /** @test */
    public function it_has_the_values_static_method_which_returns_supported_values()
    {
        $expected = ['currently', 'minutely', 'hourly', 'daily', 'alerts', 'flags'];

        $this->assertEquals($expected, Blocks::values());
    }
}
