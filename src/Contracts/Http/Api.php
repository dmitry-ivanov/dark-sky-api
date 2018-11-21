<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

use DmitryIvanov\DarkSkyApi\Contracts\Parameters;

interface Api
{
    /**
     * Make the API request(s) with the given parameters.
     *
     * Returns the weather data object or the array with objects (for the concurrent requests).
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Data|array
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     * @throws \InvalidArgumentException on `json_decode()` error
     */
    public function request(Parameters $parameters);
}
