<?php

namespace Tests\Parameters;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Parameters\Units;

class UnitsTest extends TestCase
{
    /** @test */
    public function it_has_the_values_static_method_which_returns_supported_values()
    {
        $expected = ['auto', 'ca', 'si', 'uk2', 'us'];

        $this->assertEquals($expected, Units::values());
    }
}
