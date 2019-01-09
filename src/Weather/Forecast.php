<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

class Forecast
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
     * Create a new instance of the forecast response.
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
     * @return \DmitryIvanov\DarkSkyApi\Weather\Headers
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
     * A data point containing the current weather conditions at the requested location.
     *
     * @see https://darksky.net/dev/docs#data-point
     *
     * @return \DmitryIvanov\DarkSkyApi\Weather\DataPoint|null
     */
    public function currently()
    {
        $currently = \DmitryIvanov\DarkSkyApi\array_get($this->data, 'currently');

        if (is_null($currently)) {
            return null;
        }

        return new DataPoint($currently);
    }

    /**
     * A data block containing the weather conditions minute-by-minute for the next hour.
     *
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Weather\DataBlock|null
     */
    public function minutely()
    {
        $minutely = \DmitryIvanov\DarkSkyApi\array_get($this->data, 'minutely');

        if (is_null($minutely)) {
            return null;
        }

        return new DataBlock($minutely);
    }

    /**
     * A data block containing the weather conditions hour-by-hour for the next two days.
     *
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Weather\DataBlock|null
     */
    public function hourly()
    {
        $hourly = \DmitryIvanov\DarkSkyApi\array_get($this->data, 'hourly');

        if (is_null($hourly)) {
            return null;
        }

        return new DataBlock($hourly);
    }

    /**
     * A data block containing the weather conditions day-by-day for the next week.
     *
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Weather\DataBlock|null
     */
    public function daily()
    {
        $daily = \DmitryIvanov\DarkSkyApi\array_get($this->data, 'daily');

        if (is_null($daily)) {
            return null;
        }

        return new DataBlock($daily);
    }

    /**
     * Severe weather warnings issued for the requested location by a governmental authority.
     *
     * @see https://darksky.net/dev/docs#alerts
     *
     * @return \DmitryIvanov\DarkSkyApi\Weather\Alert[]|null
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
     * @return \DmitryIvanov\DarkSkyApi\Weather\Flags|null
     */
    public function flags()
    {
        $flags = \DmitryIvanov\DarkSkyApi\array_get($this->data, 'flags');

        if (is_null($flags)) {
            return null;
        }

        return new Flags($flags);
    }

    /**
     * Get an array representation of the forecast response.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
