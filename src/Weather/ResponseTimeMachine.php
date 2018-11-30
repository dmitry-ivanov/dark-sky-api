<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

use DmitryIvanov\DarkSkyApi\Contracts\Weather\ResponseTimeMachine as ResponseContract;

class ResponseTimeMachine extends ResponseForecast implements ResponseContract
{
    /**
     * A data point containing the weather conditions for the requested date.
     *
     * @see https://darksky.net/dev/docs#data-point
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint|null
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
