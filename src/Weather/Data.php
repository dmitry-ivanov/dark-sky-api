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
}
