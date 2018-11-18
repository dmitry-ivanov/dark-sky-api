<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

interface Url
{
    /**
     * Get the URL.
     *
     * @return string
     */
    public function value();

    /**
     * Get the metadata.
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\UrlMetadata|null
     */
    public function metadata();
}
