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
     *           ["precipProbability", 0.84]
     *           ["precipType", "snow"]
     *           ["pressure", 1016.41]
     *           ["summary", "Mostly Cloudy"]
     *           ["sunriseTime", 1509967519]
     *           ["sunsetTime", 1510003982]
     *           ["temperature", 65.76]
     *           ["temperatureHigh", 66.35]
     *           ["temperatureHighTime", 1509994800]
     *           ["temperatureLow", 41.28]
     *           ["temperatureLowTime", 1510056000]
     *           ["time", 1509944400]
     *           ["uvIndex", 3]
     *           ["uvIndexTime", 1509987600]
     *           ["visibility", 9.32]
     *           ["windBearing", 230]
     *           ["windGust", 9.52]
     *           ["windGustTime", 1510023600]
     *           ["windSpeed", 5.59]
     */
    public function it_has_the_methods_for_obtaining_specific_properties($method, $expected)
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
            'precipProbability' => 0.84,
            'precipType' => 'snow',
            'pressure' => 1016.41,
            'summary' => 'Mostly Cloudy',
            'sunriseTime' => 1509967519,
            'sunsetTime' => 1510003982,
            'temperature' => 65.76,
            'temperatureHigh' => 66.35,
            'temperatureHighTime' => 1509994800,
            'temperatureLow' => 41.28,
            'temperatureLowTime' => 1510056000,
            'time' => 1509944400,
            'uvIndex' => 3,
            'uvIndexTime' => 1509987600,
            'visibility' => 9.32,
            'windBearing' => 230,
            'windGust' => 9.52,
            'windGustTime' => 1510023600,
            'windSpeed' => 5.59,
        ]);

        $this->assertEquals($expected, $point->{$method}());
    }

    /** @test */
    public function the_iconDaily_method_returns_clear_day_if_the_icon_value_is_the_partly_cloudy_night()
    {
        $point = new DataPoint(['icon' => 'partly-cloudy-night']);

        $this->assertEquals('clear-day', $point->iconDaily());
        $this->assertEquals('partly-cloudy-night', $point->icon());
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
     *           ["precipProbability"]
     *           ["precipType"]
     *           ["pressure"]
     *           ["summary"]
     *           ["sunriseTime"]
     *           ["sunsetTime"]
     *           ["temperature"]
     *           ["temperatureHigh"]
     *           ["temperatureHighTime"]
     *           ["temperatureLow"]
     *           ["temperatureLowTime"]
     *           ["time"]
     *           ["uvIndex"]
     *           ["uvIndexTime"]
     *           ["visibility"]
     *           ["windBearing"]
     *           ["windGust"]
     *           ["windGustTime"]
     *           ["windSpeed"]
     */
    public function if_the_property_does_not_exist_then_null_would_be_returned($method)
    {
        $point = new DataPoint(['dummy']);

        $this->assertNull($point->{$method}());
    }
}
