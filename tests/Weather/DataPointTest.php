<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\DataPoint;

class DataPointTest extends TestCase
{
    /**
     * @test
     *
     * @param  string  $method
     * @param  mixed  $expected
     *
     * @testWith ["apparentTemperature", 66.01]
     */
    public function it_has_the_methods_for_getting_the_specific_properties($method, $expected)
    {
        $point = new DataPoint([
            'apparentTemperature' => 66.01,
        ]);

        $this->assertEquals($expected, $point->{$method}());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["apparentTemperature"]
     */
    public function if_the_property_does_not_exist_then_null_would_be_returned($method)
    {
        $point = new DataPoint(['dummy']);

        $this->assertNull($point->{$method}());
    }
}
