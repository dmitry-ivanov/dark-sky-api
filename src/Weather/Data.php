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
     * The HTTP response headers.
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
     * The requested latitude.
     *
     * @return float|null
     */
    public function latitude()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->data, 'latitude');
    }

    /**
     * The requested longitude.
     *
     * @return float|null
     */
    public function longitude()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->data, 'longitude');
    }

    /**
     * The IANA timezone name for the requested location.
     *
     * @return string|null
     */
    public function timezone()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->data, 'timezone');
    }

    /**
     * Severe weather warnings issued for the requested location by a governmental authority.
     *
     * The alerts would be omitted for the Time Machine Requests.
     * @see https://darksky.net/dev/docs#alerts
     * @see https://darksky.net/dev/docs#time-machine-request
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
     * Various metadata information related to the request.
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
