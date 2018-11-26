<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

use DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint as DataPointContract;

class DataPoint implements DataPointContract
{
    /**
     * The data point.
     *
     * @var array
     */
    protected $point;

    /**
     * Create a new instance of the weather data point.
     *
     * @param  array  $point
     * @return void
     */
    public function __construct(array $point)
    {
        $this->point = $point;
    }

    /**
     * The apparent (or “feels like”) temperature; not on "daily".
     *
     * @return float|null
     */
    public function apparentTemperature()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->point, 'apparentTemperature');
    }
}
