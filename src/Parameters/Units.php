<?php

namespace DmitryIvanov\DarkSkyApi\Parameters;

class Units
{
    /**
     * Get the supported units.
     *
     * @return array
     */
    public static function values()
    {
        return ['auto', 'ca', 'si', 'uk2', 'us'];
    }
}
