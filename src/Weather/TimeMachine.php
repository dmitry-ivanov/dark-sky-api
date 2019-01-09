<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

class TimeMachine extends Forecast
{
    /**
     * A data point containing the weather conditions for the requested date.
     *
     * @see https://darksky.net/dev/docs#data-point
     *
     * @return \DmitryIvanov\DarkSkyApi\Weather\DataPoint|null
     */
    public function daily()
    {
        $daily = parent::daily();

        if (is_null($daily)) {
            return null;
        }

        $points = $daily->data();

        return array_shift($points);
    }
}
