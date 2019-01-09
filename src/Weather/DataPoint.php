<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

class DataPoint
{
    /**
     * The data point.
     *
     * @var array
     */
    protected $point;

    /**
     * Create a new instance of the weather data point.
     *
     * @param  array  $point
     * @return void
     */
    public function __construct(array $point)
    {
        $this->point = $point;
    }

    /**
     * The apparent (or “feels like”) temperature; not on "daily".
     *
     * @return float|null
     */
    public function apparentTemperature()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'apparentTemperature');
    }

    /**
     * The daytime high apparent temperature; only on "daily".
     *
     * @return float|null
     */
    public function apparentTemperatureHigh()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'apparentTemperatureHigh');
    }

    /**
     * The UNIX time representing when the daytime high apparent temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function apparentTemperatureHighTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'apparentTemperatureHighTime');
    }

    /**
     * The overnight low apparent temperature; only on "daily".
     *
     * @return float|null
     */
    public function apparentTemperatureLow()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'apparentTemperatureLow');
    }

    /**
     * The UNIX time representing when the overnight low apparent temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function apparentTemperatureLowTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'apparentTemperatureLowTime');
    }

    /**
     * The percentage of sky occluded by clouds, between 0 and 1, inclusive.
     *
     * @return float|null
     */
    public function cloudCover()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'cloudCover');
    }

    /**
     * The dew point.
     *
     * @return float|null
     */
    public function dewPoint()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'dewPoint');
    }

    /**
     * The relative humidity, between 0 and 1, inclusive.
     *
     * @return float|null
     */
    public function humidity()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'humidity');
    }

    /**
     * A machine-readable text summary of this data point, suitable for selecting an icon for display.
     *
     * If defined, this property will have one of the following values:
     * "clear-day", "clear-night", "rain", "snow", "sleet", "wind",
     * "fog", "cloudy", "partly-cloudy-day", or "partly-cloudy-night".
     *
     * Developers should ensure that a sensible default is defined,
     * as additional values, such as "hail", "thunderstorm", or "tornado", may be defined in the future.
     *
     * @return string|null
     */
    public function icon()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'icon');
    }

    /**
     * Same as the "icon", but with the specific fixes for the "daily".
     *
     * @see https://darksky.net/dev/docs/faq#night-icons
     *
     * @return string|null
     */
    public function iconDaily()
    {
        $icon = $this->icon();

        if (is_null($icon)) {
            return null;
        }

        if ($icon == 'partly-cloudy-night') {
            return 'clear-day';
        }

        return $icon;
    }

    /**
     * The fractional part of the lunation number during the given day; only on "daily".
     *
     * @see https://en.wikipedia.org/wiki/Lunation_Number
     *
     * @return float|null
     */
    public function moonPhase()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'moonPhase');
    }

    /**
     * The approximate direction of the nearest storm in degrees; only on "currently".
     *
     * With true north at 0° and progressing clockwise.
     *
     * @return float|null
     */
    public function nearestStormBearing()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'nearestStormBearing');
    }

    /**
     * The approximate distance to the nearest storm; only on "currently".
     *
     * @return float|null
     */
    public function nearestStormDistance()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'nearestStormDistance');
    }

    /**
     * The columnar density of total atmospheric ozone at the given time in Dobson units.
     *
     * @return float|null
     */
    public function ozone()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'ozone');
    }

    /**
     * The amount of snowfall accumulation expected to occur; only on "hourly" and "daily".
     *
     * @return float|null
     */
    public function precipAccumulation()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'precipAccumulation');
    }

    /**
     * The intensity of precipitation occurring at the given time.
     *
     * @return float|null
     */
    public function precipIntensity()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'precipIntensity');
    }

    /**
     * The standard deviation of the distribution of "precipIntensity".
     *
     * @return float|null
     */
    public function precipIntensityError()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'precipIntensityError');
    }

    /**
     * The maximum value of "precipIntensity" during a given day; only on "daily".
     *
     * @return float|null
     */
    public function precipIntensityMax()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'precipIntensityMax');
    }

    /**
     * The UNIX time of when "precipIntensityMax" occurs during a given day; only on "daily".
     *
     * @return int|null
     */
    public function precipIntensityMaxTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'precipIntensityMaxTime');
    }

    /**
     * The probability of precipitation occurring, between 0 and 1, inclusive.
     *
     * @return float|null
     */
    public function precipProbability()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'precipProbability');
    }

    /**
     * The type of precipitation occurring at the given time.
     *
     * If defined, this property will have one of the following values:
     * "rain", "snow", or "sleet" (which refers to each of freezing rain, ice pellets, and “wintery mix”).
     *
     * @return string|null
     */
    public function precipType()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'precipType');
    }

    /**
     * The sea-level air pressure.
     *
     * @return float|null
     */
    public function pressure()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'pressure');
    }

    /**
     * A human-readable text summary of this data point.
     *
     * @return string|null
     */
    public function summary()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'summary');
    }

    /**
     * The UNIX time of when the sun will rise during a given day; only on "daily".
     *
     * @return int|null
     */
    public function sunriseTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'sunriseTime');
    }

    /**
     * The UNIX time of when the sun will set during a given day; only on "daily".
     *
     * @return int|null
     */
    public function sunsetTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'sunsetTime');
    }

    /**
     * The air temperature; not on "minutely".
     *
     * @return float|null
     */
    public function temperature()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'temperature');
    }

    /**
     * The daytime high temperature; only on "daily".
     *
     * @return float|null
     */
    public function temperatureHigh()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'temperatureHigh');
    }

    /**
     * The UNIX time representing when the daytime high temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function temperatureHighTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'temperatureHighTime');
    }

    /**
     * The overnight low temperature; only on "daily".
     *
     * @return float|null
     */
    public function temperatureLow()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'temperatureLow');
    }

    /**
     * The UNIX time representing when the overnight low temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function temperatureLowTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'temperatureLowTime');
    }

    /**
     * The UNIX time at which this data point begins.
     *
     * @return int|null
     */
    public function time()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'time');
    }

    /**
     * The UV index.
     *
     * @return float|null
     */
    public function uvIndex()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'uvIndex');
    }

    /**
     * The UNIX time of when the maximum "uvIndex" occurs during a given day; only on "daily".
     *
     * @return int|null
     */
    public function uvIndexTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'uvIndexTime');
    }

    /**
     * The average visibility, capped at 10 miles.
     *
     * @return float|null
     */
    public function visibility()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'visibility');
    }

    /**
     * The direction that the wind is coming from in degrees.
     *
     * With true north at 0° and progressing clockwise.
     *
     * @return float|null
     */
    public function windBearing()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'windBearing');
    }

    /**
     * The wind gust speed.
     *
     * @return float|null
     */
    public function windGust()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'windGust');
    }

    /**
     * The time at which the maximum wind gust speed occurs during the day; only on "daily".
     *
     * @return int|null
     */
    public function windGustTime()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'windGustTime');
    }

    /**
     * The wind speed.
     *
     * @return float|null
     */
    public function windSpeed()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'windSpeed');
    }

    /**
     * Get an array representation of the data point.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->point;
    }
}
