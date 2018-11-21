<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

use DmitryIvanov\DarkSkyApi\Contracts\Parameters;

interface Api
{
    /**
     * Make the API request(s) with the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return array
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     * @throws \InvalidArgumentException on `json_decode()` error
     */
    public function request(Parameters $parameters);
}
