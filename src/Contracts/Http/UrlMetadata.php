<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

interface UrlMetadata
{
    /**
     * Get the date, for which the URL was generated.
     *
     * The format is "Y-m-d":
     * @see http://php.net/manual/en/function.date.php
     *
     * @return string
     */
    public function date();
}
