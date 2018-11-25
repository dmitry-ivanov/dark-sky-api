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
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Headers
     */
    public function headers()
    {
        return new Headers($this->headers);
    }

    /**
     * Get the latitude.
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
}
