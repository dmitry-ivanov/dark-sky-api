<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Flags
{
    /**
     * Determine if the weather data is unavailable now.
     *
     * The returned "true" value indicates that the Dark Sky data source supports the given location,
     * but a temporary error (such as a radar station being down for maintenance) has made the data unavailable.
     *
     * @return bool
     */
    public function isUnavailable();

    /**
     * The distance to the nearest weather station that contributed data to this response.
     *
     * Many other stations may have also been used; this value is primarily for debugging purposes.
     * This property's value is in miles (if US units are selected) or kilometers (if SI units are selected).
     *
     * @return float|null
     */
    public function nearestStation();

    /**
     * The IDs of the data sources utilized in servicing this request.
     *
     * @see https://darksky.net/dev/docs/sources
     *
     * @return array|null
     */
    public function sources();

    /**
     * The units which were used for the data in this request.
     *
     * @return string|null
     */
    public function units();

    /**
     * Get an array representation of the flags.
     *
     * @return array
     */
    public function toArray();
}
