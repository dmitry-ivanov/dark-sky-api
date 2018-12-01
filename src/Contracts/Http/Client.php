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
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \Exception on error
     * @throws \Throwable on error in PHP >=7
     */
    public function request(Request $request);

    /**
     * Make the concurrent API requests by the given array of the request objects.
     *
     * Returns an associative array of the responses, with the request IDs used as the keys.
     *
     * @param  array  $requests
     * @return array
     *
     * @throws \Exception on error
     * @throws \Throwable on error in PHP >=7
     */
    public function concurrentRequests(array $requests);
}
