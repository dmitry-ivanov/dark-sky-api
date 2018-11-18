<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Validation;

use DmitryIvanov\DarkSkyApi\Contracts\Parameters;

interface Validator
{
    /**
     * Validate the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function validate(Parameters $parameters);
}
