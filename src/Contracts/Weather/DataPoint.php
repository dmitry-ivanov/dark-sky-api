<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface DataPoint
{
    /**
     * The apparent (or “feels like”) temperature; not on "daily".
     *
     * @return float|null
     */
    public function apparentTemperature();

    /**
     * The daytime high apparent temperature; only on "daily".
     *
     * @return float|null
     */
    public function apparentTemperatureHigh();

    /**
     * The UNIX time representing when the daytime high apparent temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function apparentTemperatureHighTime();

    /**
     * The overnight low apparent temperature; only on "daily".
     *
     * @return float|null
     */
    public function apparentTemperatureLow();

    /**
     * The UNIX time representing when the overnight low apparent temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function apparentTemperatureLowTime();

    /**
     * The percentage of sky occluded by clouds, between 0 and 1, inclusive.
     *
     * @return float|null
     */
    public function cloudCover();

    /**
     * The dew point.
     *
     * @return float|null
     */
    public function dewPoint();

    /**
     * The relative humidity, between 0 and 1, inclusive.
     *
     * @return float|null
     */
    public function humidity();

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
    public function icon();

    /**
     * Same as the "icon", but with the specific fixes for the "daily".
     *
     * @see https://darksky.net/dev/docs/faq#night-icons
     *
     * @return string|null
     */
    public function iconDaily();

    /**
     * The fractional part of the lunation number during the given day; only on "daily".
     *
     * @see https://en.wikipedia.org/wiki/Lunation_Number
     *
     * @return float|null
     */
    public function moonPhase();

    /**
     * The approximate direction of the nearest storm in degrees; only on "currently".
     *
     * With true north at 0° and progressing clockwise.
     *
     * @return float|null
     */
    public function nearestStormBearing();

    /**
     * The approximate distance to the nearest storm; only on "currently".
     *
     * @return float|null
     */
    public function nearestStormDistance();

    /**
     * The columnar density of total atmospheric ozone at the given time in Dobson units.
     *
     * @return float|null
     */
    public function ozone();

    /**
     * The amount of snowfall accumulation expected to occur; only on "hourly" and "daily".
     *
     * @return float|null
     */
    public function precipAccumulation();

    /**
     * The intensity of precipitation occurring at the given time.
     *
     * @return float|null
     */
    public function precipIntensity();

    /**
     * The standard deviation of the distribution of "precipIntensity".
     *
     * @return float|null
     */
    public function precipIntensityError();

    /**
     * The maximum value of "precipIntensity" during a given day; only on "daily".
     *
     * @return float|null
     */
    public function precipIntensityMax();

    /**
     * The UNIX time of when "precipIntensityMax" occurs during a given day; only on "daily".
     *
     * @return int|null
     */
    public function precipIntensityMaxTime();

    /**
     * The probability of precipitation occurring, between 0 and 1, inclusive.
     *
     * @return float|null
     */
    public function precipProbability();

    /**
     * The type of precipitation occurring at the given time.
     *
     * If defined, this property will have one of the following values:
     * "rain", "snow", or "sleet" (which refers to each of freezing rain, ice pellets, and “wintery mix”).
     *
     * @return string|null
     */
    public function precipType();

    /**
     * The sea-level air pressure.
     *
     * @return float|null
     */
    public function pressure();

    /**
     * A human-readable text summary of this data point.
     *
     * @return string|null
     */
    public function summary();

    /**
     * The UNIX time of when the sun will rise during a given day; only on "daily".
     *
     * @return int|null
     */
    public function sunriseTime();

    /**
     * The UNIX time of when the sun will set during a given day; only on "daily".
     *
     * @return int|null
     */
    public function sunsetTime();

    /**
     * The air temperature; not on "minutely".
     *
     * @return float|null
     */
    public function temperature();

    /**
     * The daytime high temperature; only on "daily".
     *
     * @return float|null
     */
    public function temperatureHigh();

    /**
     * The UNIX time representing when the daytime high temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function temperatureHighTime();

    /**
     * The overnight low temperature; only on "daily".
     *
     * @return float|null
     */
    public function temperatureLow();

    /**
     * The UNIX time representing when the overnight low temperature occurs; only on "daily".
     *
     * @return int|null
     */
    public function temperatureLowTime();

    /**
     * The UNIX time at which this data point begins.
     *
     * @return int|null
     */
    public function time();

    /**
     * The UV index.
     *
     * @return float|null
     */
    public function uvIndex();

    /**
     * The UNIX time of when the maximum "uvIndex" occurs during a given day; only on "daily".
     *
     * @return int|null
     */
    public function uvIndexTime();

    /**
     * The average visibility, capped at 10 miles.
     *
     * @return float|null
     */
    public function visibility();

    /**
     * The direction that the wind is coming from in degrees.
     *
     * With true north at 0° and progressing clockwise.
     *
     * @return float|null
     */
    public function windBearing();

    /**
     * The wind gust speed.
     *
     * @return float|null
     */
    public function windGust();

    /**
     * The time at which the maximum wind gust speed occurs during the day; only on "daily".
     *
     * @return int|null
     */
    public function windGustTime();

    /**
     * The wind speed.
     *
     * @return float|null
     */
    public function windSpeed();

    /**
     * Get an array representation of the data point.
     *
     * @return array
     */
    public function toArray();
}
