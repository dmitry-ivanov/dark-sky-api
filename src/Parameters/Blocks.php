<?php

namespace DmitryIvanov\DarkSkyApi\Parameters;

class Blocks
{
    /**
     * Get the supported blocks values.
     *
     * @return array
     */
    public static function values()
    {
        return ['currently', 'minutely', 'hourly', 'daily', 'alerts', 'flags'];
    }
}
