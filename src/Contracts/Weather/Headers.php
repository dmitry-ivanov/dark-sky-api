<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Headers
{
    /**
     * The number of API requests made by the given API key for today.
     *
     * @return array
     */
    public function apiCalls();

    /**
     * The conservative value for data caching purposes, based on the data present in the response body.
     *
     * @return array
     */
    public function cacheControl();

    /**
     * The server-side response time of the request.
     *
     * @return array
     */
    public function responseTime();

    /**
     * Get an array representation of the headers.
     *
     * @return array
     */
    public function toArray();
}
