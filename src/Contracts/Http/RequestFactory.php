<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

use DmitryIvanov\DarkSkyApi\Contracts\Parameters;

interface RequestFactory
{
    /**
     * Create the API request(s) by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Request|array
     */
    public function create(Parameters $parameters);
}
