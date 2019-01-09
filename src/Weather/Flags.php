<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

class Flags
{
    /**
     * The flags.
     *
     * @var array
     */
    protected $flags;

    /**
     * Create a new instance of the weather flags.
     *
     * @param  array  $flags
     * @return void
     */
    public function __construct(array $flags)
    {
        $this->flags = $flags;
    }

    /**
     * Determine if the weather data is unavailable now.
     *
     * The returned "true" value indicates that the Dark Sky data source supports the given location,
     * but a temporary error (such as a radar station being down for maintenance) has made the data unavailable.
     *
     * @return bool
     */
    public function isUnavailable()
    {
        return array_key_exists('darksky-unavailable', $this->flags);
    }

    /**
     * The distance to the nearest weather station that contributed data to this response.
     *
     * Many other stations may have also been used; this value is primarily for debugging purposes.
     * This property's value is in miles (if US units are selected) or kilometers (if SI units are selected).
     *
     * @return float|null
     */
    public function nearestStation()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->flags, 'nearest-station');
    }

    /**
     * The IDs of the data sources utilized in servicing this request.
     *
     * @see https://darksky.net/dev/docs/sources
     *
     * @return array|null
     */
    public function sources()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->flags, 'sources');
    }

    /**
     * The units which were used for the data in this request.
     *
     * @return string|null
     */
    public function units()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->flags, 'units');
    }

    /**
     * Get an array representation of the flags.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->flags;
    }
}
