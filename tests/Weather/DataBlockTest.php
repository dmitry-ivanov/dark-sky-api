<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\DataBlock;
use DmitryIvanov\DarkSkyApi\Weather\DataPoint;

class DataBlockTest extends TestCase
{
    /** @test */
    public function it_has_the_data_method()
    {
        $block = new DataBlock([
            'data' => [
                $point1 = ['dummy-point-1'],
                $point2 = ['dummy-point-2'],
                $point3 = ['dummy-point-3'],
            ],
        ]);

        $expected = [
            new DataPoint($point1),
            new DataPoint($point2),
            new DataPoint($point3),
        ];

        $this->assertEquals($expected, $block->data());
    }

    /** @test */
    public function if_the_data_is_not_set_then_data_method_returns_an_empty_array()
    {
        $block = new DataBlock(['dummy']);

        $this->assertEquals([], $block->data());
    }

    /**
     * @test
     *
     * @param  string  $method
     * @param  mixed  $expected
     *
     * @testWith ["icon", "rain"]
     *           ["summary", "Rain starting later this afternoon, continuing until this evening."]
     */
    public function it_has_the_methods_for_obtaining_specific_properties($method, $expected)
    {
        $block = new DataBlock([
            'icon' => 'rain',
            'summary' => 'Rain starting later this afternoon, continuing until this evening.',
        ]);

        $this->assertEquals($expected, $block->{$method}());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["icon"]
     *           ["summary"]
     */
    public function if_the_property_does_not_exist_then_null_would_be_returned($method)
    {
        $block = new DataBlock(['dummy']);

        $this->assertNull($block->{$method}());
    }

    /** @test */
    public function it_has_toArray_method()
    {
        $block = new DataBlock(['dummy']);

        $this->assertEquals(['dummy'], $block->toArray());
    }
}
