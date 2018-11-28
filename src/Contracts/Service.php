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
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function location($latitude, $longitude);

    /**
     * Set the units.
     *
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  string  $units
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function units($units);

    /**
     * Set the language.
     *
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  string  $language
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function language($language);

    /**
     * Set the extended blocks.
     *
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  string  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function extend($blocks);

    /**
     * Get the weather forecast data.
     *
     * @see https://darksky.net/dev/docs#forecast-request
     *
     * @param  array|string|null  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Data
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     */
    public function forecast($blocks = null);

    /**
     * Get the observed weather data for the given dates.
     *
     * Returns the weather data object or the array of the weather data objects for the multiple dates.
     * @see https://darksky.net/dev/docs#time-machine-request
     *
     * @param  array|string  $dates
     * @param  array|string|null  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Data|array
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     */
    public function timeMachine($dates, $blocks = null);
}
