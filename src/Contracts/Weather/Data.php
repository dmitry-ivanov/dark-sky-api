<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Data
{
    /**
     * Get the headers.
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Headers
     */
    public function headers();
}
