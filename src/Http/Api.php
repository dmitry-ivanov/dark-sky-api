<?php

namespace DmitryIvanov\DarkSkyApi\Http;

use Psr\Http\Message\ResponseInterface;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
use DmitryIvanov\DarkSkyApi\Http\Client\GuzzleClient;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Api as ApiContract;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Client as ClientContract;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Request as RequestContract;
use DmitryIvanov\DarkSkyApi\Contracts\Http\RequestFactory as RequestFactoryContract;

class Api implements ApiContract
{
    /**
     * The HTTP client.
     *
     * @var \DmitryIvanov\DarkSkyApi\Contracts\Http\Client
     */
    protected $client;

    /**
     * The request factory.
     *
     * @var \DmitryIvanov\DarkSkyApi\Contracts\Http\RequestFactory
     */
    protected $factory;

    /**
     * Create a new instance of the HTTP API.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\Client|null  $client
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\RequestFactory|null  $factory
     * @return void
     */
    public function __construct(ClientContract $client = null, RequestFactoryContract $factory = null)
    {
        $this->client = isset($client) ? $client : new GuzzleClient;
        $this->factory = isset($factory) ? $factory : new RequestFactory;
    }

    /**
     * Make the API request(s) with the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return array
     *
     * @throws \Exception on error
     * @throws \Throwable on error in PHP >=7
     */
    public function request(Parameters $parameters)
    {
        $request = $this->factory->create($parameters);

        if ($request instanceof RequestContract) {
            $response = $this->client->gzip()->request($request);
            return json_decode($response->getBody(), true);
        }

        return array_map(function (ResponseInterface $response) {
            return json_decode($response->getBody(), true);
        }, $this->client->gzip()->concurrentRequests($request));
    }
}
