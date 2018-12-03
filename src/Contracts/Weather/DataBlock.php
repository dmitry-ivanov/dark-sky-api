<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface DataBlock
{
    /**
     * An array of data points, ordered by time.
     *
     * These points together describe the weather conditions at the requested location over time.
     * @see \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint
     *
     * @return array
     */
    public function data();

    /**
     * A machine-readable text summary of this data block.
     *
     * May take on the same values as the "icon" property of data points.
     * @see \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint::icon()
     *
     * @return string|null
     */
    public function icon();

    /**
     * A human-readable summary of this data block.
     *
     * @return string|null
     */
    public function summary();

    /**
     * Get an array representation of the data block.
     *
     * @return array
     */
    public function toArray();
}
