<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

use DmitryIvanov\DarkSkyApi\Contracts\Weather\Data as DataContract;

class Data implements DataContract
{
    /**
     * The data.
     *
     * @var array
     */
    protected $data;

    /**
     * The headers.
     *
     * @var array
     */
    protected $headers;

    /**
     * Create a new instance of the weather data.
     *
     * @param  array  $data
     * @param  array  $headers
     * @return void
     */
    public function __construct(array $data, array $headers)
    {
        $this->data = $data;
        $this->headers = $headers;
    }

    /**
     * Get the headers.
     *
     * The API will set several HTTP response headers to values useful to developers.
     *
     * @see https://darksky.net/dev/docs#response-headers
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Headers
     */
    public function headers()
    {
        return new Headers($this->headers);
    }

    /**
     * Get the latitude.
     *
     * The requested latitude.
     *
     * @return float|null
     */
    public function latitude()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->data, 'latitude');
    }

    /**
     * Get the longitude.
     *
     * The requested longitude.
     *
     * @return float|null
     */
    public function longitude()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->data, 'longitude');
    }

    /**
     * Get the timezone.
     *
     * The IANA timezone name for the requested location.
     *
     * @return string|null
     */
    public function timezone()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->data, 'timezone');
    }

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
    public function alerts()
    {
        $alerts = \DmitryIvanov\DarkSkyApi\array_get($this->data, 'alerts');

        if (is_null($alerts)) {
            return null;
        }

        return array_map(function (array $alert) {
            return new Alert($alert);
        }, $alerts);
    }

    /**
     * Get the flags.
     *
     * The flags object contains various metadata information related to the request.
     *
     * @see https://darksky.net/dev/docs#flags
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Flags|null
     */
    public function flags()
    {
        $flags = \DmitryIvanov\DarkSkyApi\array_get($this->data, 'flags');

        if (is_null($flags)) {
            return null;
        }

        return new Flags($flags);
    }
}
