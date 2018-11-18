<?php

namespace Tests\Http\Client;

use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
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
        $client = mock(Client::class);
        $response = mock(Response::class);
        $request = (new ForecastStub)->expectedRequests();

        $client->shouldReceive('get')
            ->with($request->url(), ['decode_content' => 'gzip', 'query' => $request->query()])
            ->andReturn($response);

        $response->shouldReceive('getBody')
            ->withNoArgs()
            ->andReturn(\GuzzleHttp\json_encode(['status' => 'success']));

        $this->assertEquals(['status' => 'success'], (new GuzzleClient($client))->gzip()->request($request));
    }

    /** @test */
    public function it_has_the_concurrent_requests_method()
    {
        $client = mock(Client::class);
        $requests = (new ForecastWithMultipleDatesStub)->expectedRequests();

        array_walk($requests, function (Request $request) use ($client) {
            $promise = mock(PromiseInterface::class);
            $response = mock(Response::class);

            $client->shouldReceive('getAsync')
                ->with($request->url(), ['decode_content' => 'gzip', 'query' => $request->query()])
                ->andReturn($promise);

            $promise->shouldReceive('wait')
                ->withNoArgs()
                ->andReturn($response);

            $response->shouldReceive('getBody')
                ->withNoArgs()
                ->andReturn(\GuzzleHttp\json_encode(['status' => "success-{$request->id()}"]));
        });

        $this->assertEquals([
            '2018-09-09' => ['status' => 'success-2018-09-09'],
            '2018-10-10' => ['status' => 'success-2018-10-10'],
            '2018-11-11' => ['status' => 'success-2018-11-11'],
        ], (new GuzzleClient($client))->gzip()->concurrentRequests($requests));
    }
}
