<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface DataPoint
{
    /**
     * The apparent (or “feels like”) temperature; not on "daily".
     *
     * @return float|null
     */
    public function apparentTemperature();
}
