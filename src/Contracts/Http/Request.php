<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

interface Request
{
    /**
     * Get the ID.
     *
     * @return string|null
     */
    public function id();

    /**
     * Get the URL.
     *
     * @return string
     */
    public function url();

    /**
     * Get the query string.
     *
     * @return string
     */
    public function query();
}
