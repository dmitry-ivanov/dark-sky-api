<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Weather;

use DmitryIvanov\DarkSkyApi\Weather\Alert;
use DmitryIvanov\DarkSkyApi\Tests\TestCase;

class AlertTest extends TestCase
{
    /**
     * @test
     *
     * @param  string  $method
     * @param  mixed  $expected
     *
     * @testWith ["description", "FLOOD WATCH REMAINS IN EFFECT THROUGH LATE MONDAY NIGHT..."]
     *           ["expires", 1510036680]
     *           ["regions", ["Dukes", "Eastern Essex"]]
     *           ["severity", "advisory"]
     *           ["time", 1509993360]
     *           ["title", "Flood Watch for Mason, WA"]
     *           ["uri", "http://alerts.weather.gov/cap/wwacapget.php?x=WA1255E4DB8494"]
     */
    public function it_has_the_methods_for_obtaining_specific_properties($method, $expected)
    {
        $alert = new Alert([
            'description' => 'FLOOD WATCH REMAINS IN EFFECT THROUGH LATE MONDAY NIGHT...',
            'expires' => 1510036680,
            'regions' => ['Dukes', 'Eastern Essex'],
            'severity' => 'advisory',
            'time' => 1509993360,
            'title' => 'Flood Watch for Mason, WA',
            'uri' => 'http://alerts.weather.gov/cap/wwacapget.php?x=WA1255E4DB8494',
        ]);

        $this->assertEquals($expected, $alert->{$method}());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["description"]
     *           ["expires"]
     *           ["regions"]
     *           ["severity"]
     *           ["time"]
     *           ["title"]
     *           ["uri"]
     */
    public function if_the_property_does_not_exist_then_null_would_be_returned($method)
    {
        $alert = new Alert(['dummy']);

        $this->assertNull($alert->{$method}());
    }

    /** @test */
    public function it_has_toArray_method()
    {
        $alert = new Alert(['dummy']);

        $this->assertEquals(['dummy'], $alert->toArray());
    }
}
