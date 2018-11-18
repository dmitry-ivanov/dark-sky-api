<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http\Request;

use DmitryIvanov\DarkSkyApi\Contracts\Parameters;

interface QueryBuilder
{
    /**
     * Build the request query string by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return string
     */
    public function build(Parameters $parameters);
}
