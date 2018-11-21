<?php

namespace DmitryIvanov\DarkSkyApi\Contracts;

interface Service
{
    /**
     * Get the parameters.
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Parameters
     */
    public function getParameters();

    /**
     * Set the location.
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function location($latitude, $longitude);

    /**
     * Set the units.
     *
     * @param  string  $units
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function units($units);

    /**
     * Set the language.
     *
     * @param  string  $language
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function language($language);

    /**
     * Set the extended blocks.
     *
     * @param  string  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function extend($blocks);

    /**
     * Get the weather forecast data.
     *
     * @param  array|string|null  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Data
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     * @throws \InvalidArgumentException on `json_decode()` error
     */
    public function forecast($blocks = null);

    /**
     * Get the observed weather data for a given dates.
     *
     * Returns the weather data object or the array with objects (for the concurrent requests).
     *
     * @param  array|string  $dates
     * @param  array|string|null  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Data|array
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     * @throws \InvalidArgumentException on `json_decode()` error
     */
    public function timeMachine($dates, $blocks = null);
}
