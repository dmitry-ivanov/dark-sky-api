<?php

namespace Tests\Http\Client;

use Tests\TestCase;
use GuzzleHttp\Client as Guzzle;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Tests\Http\Stubs\Parameters\ForecastStub;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Request;
use DmitryIvanov\DarkSkyApi\Http\Client\GuzzleClient;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesStub;

class GuzzleClientTest extends TestCase
{
    /** @test */
    public function it_has_the_request_method()
    {
        $parameters = new ForecastStub;

        $guzzle = mock(Guzzle::class);
        $request = $parameters->expectedRequests();
        $response = mock(ResponseInterface::class);

        $guzzle->shouldReceive('get')
            ->with($request->url(), ['decode_content' => 'gzip', 'query' => $request->query()])
            ->andReturn($response);

        $client = new GuzzleClient($guzzle);
        $this->assertEquals($response, $client->gzip()->request($request));
    }

    /** @test */
    public function it_has_the_concurrent_requests_method()
    {
        $parameters = new ForecastWithMultipleDatesStub;

        $guzzle = mock(Guzzle::class);
        $requests = $parameters->expectedRequests();
        $expected = [];

        array_walk($requests, function (Request $request) use ($guzzle, &$expected) {
            $promise = mock(PromiseInterface::class);
            $response = mock(ResponseInterface::class);

            $guzzle->shouldReceive('getAsync')
                ->with($request->url(), ['decode_content' => 'gzip', 'query' => $request->query()])
                ->andReturn($promise);

            $promise->shouldReceive('wait')
                ->withNoArgs()
                ->andReturn($response);

            $expected[$request->id()] = $response;
        });

        $client = new GuzzleClient($guzzle);
        $this->assertEquals($expected, $client->gzip()->concurrentRequests($requests));
    }
}
