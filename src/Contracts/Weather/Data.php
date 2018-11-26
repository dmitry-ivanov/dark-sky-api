<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Data
{
    /**
     * Get the headers.
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Headers
     */
    public function headers();

    /**
     * Get the latitude.
     *
     * @return float|null
     */
    public function latitude();

    /**
     * Get the longitude.
     *
     * @return float|null
     */
    public function longitude();

    /**
     * Get the timezone.
     *
     * The IANA timezone name for the requested location.
     *
     * @return string|null
     */
    public function timezone();

    /**
     * Get the alerts.
     *
     * The alerts array contains objects representing the severe weather
     * warnings issued for the requested location by a governmental authority.
     *
     * The alerts would be omitted for the Time Machine Requests:
     * @see https://darksky.net/dev/docs#time-machine-request
     *
     * The list of the data sources:
     * @see https://darksky.net/dev/docs/sources
     *
     * @return array|null
     */
    public function alerts();
}
