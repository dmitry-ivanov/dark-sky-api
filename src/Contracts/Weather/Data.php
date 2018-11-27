<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Data
{
    /**
     * The HTTP response headers.
     *
     * @see https://darksky.net/dev/docs#response-headers
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Headers
     */
    public function headers();

    /**
     * The requested latitude.
     *
     * @return float|null
     */
    public function latitude();

    /**
     * The requested longitude.
     *
     * @return float|null
     */
    public function longitude();

    /**
     * The IANA timezone name for the requested location.
     *
     * @return string|null
     */
    public function timezone();

    /**
     * The current weather conditions at the requested location.
     *
     * For the Time Machine Requests, it refers to the time provided, rather than the current time.
     * @see https://darksky.net/dev/docs#data-point
     * @see https://darksky.net/dev/docs#time-machine-request
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint|null
     */
    public function currently();

    /**
     * Severe weather warnings issued for the requested location by a governmental authority.
     *
     * The alerts would be omitted for the Time Machine Requests.
     * @see https://darksky.net/dev/docs#alerts
     * @see https://darksky.net/dev/docs#time-machine-request
     *
     * @return array|null
     */
    public function alerts();

    /**
     * Various metadata information related to the request.
     *
     * @see https://darksky.net/dev/docs#flags
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Flags|null
     */
    public function flags();
}
