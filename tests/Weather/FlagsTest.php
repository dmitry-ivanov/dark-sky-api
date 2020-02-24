<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Weather;

use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\Flags;

class FlagsTest extends TestCase
{
    /**
     * @test
     *
     * @param  array  data
     * @param  bool  $expected
     *
     * @testWith [[], false]
     *           [["dummy"], false]
     *           [{"darksky-unavailable": null}, true]
     *           [{"darksky-unavailable": ""}, true]
     *           [{"darksky-unavailable": true}, true]
     *           [{"darksky-unavailable": false}, true]
     *           [{"darksky-unavailable": 0}, true]
     *           [{"darksky-unavailable": 1}, true]
     *           [{"darksky-unavailable": "dummy"}, true]
     */
    public function it_has_the_isUnavailable_method(array $data, $expected)
    {
        $flags = new Flags($data);

        $this->assertEquals($expected, $flags->isUnavailable());
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

    /** @test */
    public function it_has_toArray_method()
    {
        $flags = new Flags(['dummy']);

        $this->assertEquals(['dummy'], $flags->toArray());
    }
}
