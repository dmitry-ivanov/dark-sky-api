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

    /**
     * Get the latitude.
     *
     * @return float|null
     */
    public function latitude();

    /**
     * Get the longitude.
     *
     * @return float|null
     */
    public function longitude();

    /**
     * Get the timezone.
     *
     * The IANA timezone name for the requested location.
     *
     * @return string|null
     */
    public function timezone();
}
