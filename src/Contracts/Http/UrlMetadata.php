<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

interface UrlMetadata
{
    /**
     * Get the date, for which the URL was generated.
     *
     * @return string
     */
    public function date();
}
