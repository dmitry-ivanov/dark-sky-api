<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Flags;

class FlagsTest extends TestCase
{
    /**
     * @test
     *
     * @param  array  $flags
     * @param  bool  $expected
     *
     * @testWith [{"darksky-unavailable": null}, true]
     *           [{"darksky-unavailable": ""}, true]
     *           [{"darksky-unavailable": true}, true]
     *           [{"darksky-unavailable": false}, true]
     *           [{"darksky-unavailable": 0}, true]
     *           [{"darksky-unavailable": 1}, true]
     *           [{"darksky-unavailable": "dummy"}, true]
     *           [[], false]
     *           [["dummy"], false]
     */
    public function it_has_the_isUnavailable_method_which_returns_true_if_the_property_key_exists(array $flags, $expected)
    {
        $this->assertEquals($expected, (new Flags($flags))->isUnavailable());
    }

    /**
     * @test
     *
     * @param  string  $method
     * @param  mixed  $expected
     *
     * @testWith ["nearestStation", 0.69]
     *           ["sources", ["cmc", "gfs", "isd"]]
     *           ["units", "si"]
     */
    public function it_has_the_methods_for_obtaining_specific_properties($method, $expected)
    {
        $flags = new Flags([
            'nearest-station' => 0.69,
            'sources' => ['cmc', 'gfs', 'isd'],
            'units' => 'si',
        ]);

        $this->assertEquals($expected, $flags->{$method}());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["nearestStation"]
     *           ["sources"]
     *           ["units"]
     */
    public function if_the_property_does_not_exist_then_null_would_be_returned($method)
    {
        $flags = new Flags(['dummy']);

        $this->assertNull($flags->{$method}());
    }
}
