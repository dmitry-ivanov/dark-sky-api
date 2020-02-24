<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Parameters;

use DmitryIvanov\DarkSkyApi\Parameters\Units;
use DmitryIvanov\DarkSkyApi\Tests\TestCase;

class UnitsTest extends TestCase
{
    /** @test */
    public function it_has_the_values_static_method_which_returns_supported_values()
    {
        $expected = ['auto', 'ca', 'si', 'uk2', 'us'];

        $this->assertEquals($expected, Units::values());
    }
}
