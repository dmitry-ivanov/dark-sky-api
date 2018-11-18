<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Http;

interface Client
{
    /**
     * Force API requests to accept `gzip` encoding and automatically decode the response.
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Client
     */
    public function gzip();

    /**
     * Make an API request by the given request object.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\Request  $request
     * @return array
     */
    public function request(Request $request);

    /**
     * Make concurrent API requests by the given array of the request objects.
     *
     * @param  array  $requests
     * @return array
     */
    public function concurrentRequests(array $requests);
}
