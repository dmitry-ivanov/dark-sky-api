<?php

namespace DmitryIvanov\DarkSkyApi\Http\Client;

use GuzzleHttp\Client as Guzzle;
use DmitryIvanov\DarkSkyApi\Http\Request;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Client;

class GuzzleClient implements Client
{
    /**
     * The Guzzle client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new instance of the client.
     *
     * @param  \GuzzleHttp\Client|null  $client
     * @return void
     */
    public function __construct(Guzzle $client = null)
    {
        $this->client = isset($client) ? $client : new Guzzle;
    }

    /**
     * Force API requests to accept `gzip` encoding and automatically decode the response.
     *
     * Implemented for all requests in the `options()` method:
     * @see GuzzleClient::options()
     *
     * @return $this
     */
    public function gzip()
    {
        return $this;
    }

    /**
     * Make an API request by the given request object.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Http\Request  $request
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \Exception on error
     * @throws \Throwable on error in PHP >=7
     */
    public function request(Request $request)
    {
        return $this->client->get($request->url(), $this->options($request));
    }

    /**
     * Make the concurrent API requests by the given array of the request objects.
     *
     * Returns an associative array of the responses, with the request IDs used as the keys.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Http\Request[]  $requests
     * @return \Psr\Http\Message\ResponseInterface[]
     *
     * @throws \Exception on error
     * @throws \Throwable on error in PHP >=7
     */
    public function concurrentRequests(array $requests)
    {
        $promises = $this->composePromises($requests);

        return \GuzzleHttp\Promise\unwrap($promises);
    }

    /**
     * Compose the promises for the concurrent requests.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Http\Request[]  $requests
     * @return \GuzzleHttp\Promise\PromiseInterface[]
     */
    protected function composePromises(array $requests)
    {
        $promises = [];

        array_walk($requests, function (Request $request) use (&$promises) {
            $promises[$request->id()] = $this->client->getAsync($request->url(), $this->options($request));
        });

        return $promises;
    }

    /**
     * Compose the request options.
     *
     * @see http://docs.guzzlephp.org/en/stable/request-options.html#decode-content
     *
     * @param  \DmitryIvanov\DarkSkyApi\Http\Request  $request
     * @return array
     */
    protected function options(Request $request)
    {
        return [
            'decode_content' => 'gzip',
            'query' => $request->query(),
        ];
    }
}
