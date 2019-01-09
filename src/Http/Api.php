<?php

namespace DmitryIvanov\DarkSkyApi\Http;

use DmitryIvanov\DarkSkyApi\Parameters;
use Psr\Http\Message\ResponseInterface;
use DmitryIvanov\DarkSkyApi\Weather\Forecast;
use DmitryIvanov\DarkSkyApi\Weather\TimeMachine;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Client;
use DmitryIvanov\DarkSkyApi\Http\Client\GuzzleClient;

class Api
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
     * @var \DmitryIvanov\DarkSkyApi\Http\RequestFactory
     */
    protected $factory;

    /**
     * Create a new instance of the API.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\Client|null  $client
     * @param  \DmitryIvanov\DarkSkyApi\Http\RequestFactory|null  $factory
     * @return void
     */
    public function __construct(Client $client = null, RequestFactory $factory = null)
    {
        $this->client = isset($client) ? $client : new GuzzleClient;
        $this->factory = isset($factory) ? $factory : new RequestFactory;
    }

    /**
     * Make the forecast request.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Weather\Forecast
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     */
    public function forecast(Parameters $parameters)
    {
        $request = $this->factory->create($parameters);

        $response = $this->client->gzip()->request($request);

        return $this->composeForecastResponse($response);
    }

    /**
     * Make the time machine request(s).
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Weather\TimeMachine|\DmitryIvanov\DarkSkyApi\Weather\TimeMachine[]
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     */
    public function timeMachine(Parameters $parameters)
    {
        $request = $this->factory->create($parameters);

        if ($request instanceof Request) {
            $response = $this->client->gzip()->request($request);
            return $this->composeTimeMachineResponse($response);
        }

        $responses = $this->client->gzip()->concurrentRequests($request);

        return array_map(function (ResponseInterface $response) {
            return $this->composeTimeMachineResponse($response);
        }, $responses);
    }

    /**
     * Compose the forecast response.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $response
     * @return \DmitryIvanov\DarkSkyApi\Weather\Forecast
     *
     * @throws \InvalidArgumentException
     */
    protected function composeForecastResponse(ResponseInterface $response)
    {
        $data = \DmitryIvanov\DarkSkyApi\json_decode($response->getBody(), true);

        return new Forecast($data, $response->getHeaders());
    }

    /**
     * Compose the time machine response.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $response
     * @return \DmitryIvanov\DarkSkyApi\Weather\TimeMachine
     *
     * @throws \InvalidArgumentException
     */
    protected function composeTimeMachineResponse(ResponseInterface $response)
    {
        $data = \DmitryIvanov\DarkSkyApi\json_decode($response->getBody(), true);

        return new TimeMachine($data, $response->getHeaders());
    }
}
