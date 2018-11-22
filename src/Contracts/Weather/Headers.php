<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Headers
{
    /**
     * Get all headers.
     *
     * @return array
     */
    public function all();

    /**
     * Get the "API calls" header.
     *
     * The number of API requests made by the given API key for today.
     *
     * @return array
     */
    public function apiCalls();

    /**
     * Get the "cache control" header.
     *
     * Conservative value for data caching purposes, based on the data present in the response body.
     *
     * @return array
     */
    public function cacheControl();

    /**
     * Get the "response time" header.
     *
     * The server-side response time of the request.
     *
     * @return array
     */
    public function responseTime();
}
