<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Flags
{
    /**
     * Determine if the weather data is unavailable.
     *
     * The returned "true" value indicates that the Dark Sky data source supports the given location,
     * but a temporary error (such as a radar station being down for maintenance) has made the data unavailable.
     *
     * @return bool
     */
    public function isUnavailable();

    /**
     * Get the distance to the nearest station.
     *
     * The distance to the nearest weather station that contributed data to this response.
     * Many other stations may have also been used; this value is primarily for debugging purposes.
     * This property's value is in miles (if US units are selected) or kilometers (if SI units are selected).
     *
     * @return float|null
     */
    public function nearestStation();

    /**
     * Get the data sources.
     *
     * This property contains an array of IDs for each data source utilized in servicing this request.
     *
     * @see https://darksky.net/dev/docs/sources
     *
     * @return array|null
     */
    public function sources();

    /**
     * Get the units.
     *
     * Indicates the units which were used for the data in this request.
     *
     * @return string|null
     */
    public function units();
}
