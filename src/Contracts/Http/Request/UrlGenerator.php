<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http\Request;

use DmitryIvanov\DarkSkyApi\Contracts\Parameters;

interface UrlGenerator
{
    /**
     * Generate the request URL(s) by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url|array
     */
    public function generate(Parameters $parameters);
}
