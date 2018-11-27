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
     *           ["apparentTemperatureHigh", 66.53]
     *           ["apparentTemperatureHighTime", 1509994800]
     *           ["apparentTemperatureLow", 35.74]
     *           ["apparentTemperatureLowTime", 1510056000]
     *           ["cloudCover", 0.8]
     *           ["dewPoint", 57.66]
     *           ["humidity", 0.86]
     *           ["icon", "rain"]
     *           ["iconDaily", "rain"]
     *           ["moonPhase", 0.59]
     *           ["nearestStormBearing", 173]
     *           ["nearestStormDistance", 15.88]
     *           ["ozone", 268.95]
     *           ["precipAccumulation", 7.337]
     *           ["precipIntensity", 0.0354]
     *           ["precipIntensityError", 0.004]
     *           ["precipIntensityMax", 0.1731]
     *           ["precipIntensityMaxTime", 255657600]
     */
    public function it_has_the_methods_for_getting_the_specific_properties($method, $expected)
    {
        $point = new DataPoint([
            'apparentTemperature' => 66.01,
            'apparentTemperatureHigh' => 66.53,
            'apparentTemperatureHighTime' => 1509994800,
            'apparentTemperatureLow' => 35.74,
            'apparentTemperatureLowTime' => 1510056000,
            'cloudCover' => 0.8,
            'dewPoint' => 57.66,
            'humidity' => 0.86,
            'icon' => 'rain',
            'moonPhase' => 0.59,
            'nearestStormBearing' => 173,
            'nearestStormDistance' => 15.88,
            'ozone' => 268.95,
            'precipAccumulation' => 7.337,
            'precipIntensity' => 0.0354,
            'precipIntensityError' => 0.004,
            'precipIntensityMax' => 0.1731,
            'precipIntensityMaxTime' => 255657600,
        ]);

        $this->assertEquals($expected, $point->{$method}());
    }

    /** @test */
    public function the_iconDaily_method_returns_clear_day_if_the_icon_value_is_the_partly_cloudy_night()
    {
        $point = new DataPoint(['icon' => 'partly-cloudy-night']);

        $this->assertEquals('clear-day', $point->iconDaily());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["apparentTemperature"]
     *           ["apparentTemperatureHigh"]
     *           ["apparentTemperatureHighTime"]
     *           ["apparentTemperatureLow"]
     *           ["apparentTemperatureLowTime"]
     *           ["cloudCover"]
     *           ["dewPoint"]
     *           ["humidity"]
     *           ["icon"]
     *           ["iconDaily"]
     *           ["moonPhase"]
     *           ["nearestStormBearing"]
     *           ["nearestStormDistance"]
     *           ["ozone"]
     *           ["precipAccumulation"]
     *           ["precipIntensity"]
     *           ["precipIntensityError"]
     *           ["precipIntensityMax"]
     *           ["precipIntensityMaxTime"]
     */
    public function if_the_property_does_not_exist_then_null_would_be_returned($method)
    {
        $point = new DataPoint(['dummy']);

        $this->assertNull($point->{$method}());
    }
}
