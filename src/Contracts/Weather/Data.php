<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Data
{
    /**
     * Get the headers.
     *
     * The API will set several HTTP response headers to values useful to developers.
     *
     * @see https://darksky.net/dev/docs#response-headers
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Headers
     */
    public function headers();

    /**
     * Get the latitude.
     *
     * The requested latitude.
     *
     * @return float|null
     */
    public function latitude();

    /**
     * Get the longitude.
     *
     * The requested longitude.
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
     * @see https://darksky.net/dev/docs#alerts
     *
     * @return array|null
     */
    public function alerts();

    /**
     * Get the flags.
     *
     * The flags object contains various metadata information related to the request.
     *
     * @see https://darksky.net/dev/docs#flags
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Flags|null
     */
    public function flags();
}
