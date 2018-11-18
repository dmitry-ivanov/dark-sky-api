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
     */
    public function request(Parameters $parameters);
}
