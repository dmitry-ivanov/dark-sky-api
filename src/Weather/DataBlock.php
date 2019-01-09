<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

class DataBlock
{
    /**
     * The data block.
     *
     * @var array
     */
    protected $block;

    /**
     * Create a new instance of the weather data block.
     *
     * @param  array  $block
     * @return void
     */
    public function __construct(array $block)
    {
        $this->block = $block;
    }

    /**
     * An array of data points, ordered by time.
     *
     * These points together describe the weather conditions at the requested location over time.
     *
     * @return \DmitryIvanov\DarkSkyApi\Weather\DataPoint[]
     */
    public function data()
    {
        $data = \DmitryIvanov\DarkSkyApi\array_get($this->block, 'data', []);

        return array_map(function (array $point) {
            return new DataPoint($point);
        }, $data);
    }

    /**
     * A machine-readable text summary of this data block.
     *
     * May take on the same values as the "icon" property of data points.
     * @see \DmitryIvanov\DarkSkyApi\Weather\DataPoint::icon()
     *
     * @return string|null
     */
    public function icon()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->block, 'icon');
    }

    /**
     * A human-readable summary of this data block.
     *
     * @return string|null
     */
    public function summary()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->block, 'summary');
    }

    /**
     * Get an array representation of the data block.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->block;
    }
}
