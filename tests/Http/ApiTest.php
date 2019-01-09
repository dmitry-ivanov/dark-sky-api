<?php

namespace Tests\Http;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Http\Api;
use Psr\Http\Message\ResponseInterface;
use DmitryIvanov\DarkSkyApi\Http\Request;
use Tests\Http\Stubs\Parameters\DefaultStub;
use DmitryIvanov\DarkSkyApi\Weather\Forecast;
use DmitryIvanov\DarkSkyApi\Http\RequestFactory;
use DmitryIvanov\DarkSkyApi\Weather\TimeMachine;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Client;
use Tests\Http\Stubs\Parameters\DefaultWithDateStub;
use Tests\Http\Stubs\Parameters\DefaultWithDatesStub;

class ApiTest extends TestCase
{
    /** @test */
    public function it_has_the_forecast_method()
    {
        $parameters = new DefaultStub;

        $client = mock(Client::class);
        $factory = mock(RequestFactory::class);
        $request = $parameters->expectedRequests();
        $responseBody = ['dummy-response'];
        $responseHeaders = ['dummy-headers'];
        $clientHttpResponse = mock(ResponseInterface::class);

        $factory->shouldReceive('create')
            ->with($parameters)
            ->andReturn($request);

        $client->shouldReceive('gzip')
            ->withNoArgs()
            ->andReturnSelf();

        $client->shouldReceive('request')
            ->with($request)
            ->andReturn($clientHttpResponse);

        $clientHttpResponse->shouldReceive('getBody')
            ->withNoArgs()
            ->andReturn(json_encode($responseBody));

        $clientHttpResponse->shouldReceive('getHeaders')
            ->withNoArgs()
            ->andReturn($responseHeaders);

        $expected = new Forecast($responseBody, $responseHeaders);

        $api = new Api($client, $factory);
        $this->assertEquals($expected, $api->forecast($parameters));
    }

    /** @test */
    public function it_has_the_timeMachine_method()
    {
        $parameters = new DefaultWithDateStub;

        $client = mock(Client::class);
        $factory = mock(RequestFactory::class);
        $request = $parameters->expectedRequests();
        $responseBody = ['dummy-response'];
        $responseHeaders = ['dummy-headers'];
        $clientHttpResponse = mock(ResponseInterface::class);

        $factory->shouldReceive('create')
            ->with($parameters)
            ->andReturn($request);

        $client->shouldReceive('gzip')
            ->withNoArgs()
            ->andReturnSelf();

        $client->shouldReceive('request')
            ->with($request)
            ->andReturn($clientHttpResponse);

        $clientHttpResponse->shouldReceive('getBody')
            ->withNoArgs()
            ->andReturn(json_encode($responseBody));

        $clientHttpResponse->shouldReceive('getHeaders')
            ->withNoArgs()
            ->andReturn($responseHeaders);

        $expected = new TimeMachine($responseBody, $responseHeaders);

        $api = new Api($client, $factory);
        $this->assertEquals($expected, $api->timeMachine($parameters));
    }

    /** @test */
    public function the_timeMachine_method_would_make_the_concurrent_requests_for_the_multiple_dates()
    {
        $parameters = new DefaultWithDatesStub;

        $client = mock(Client::class);
        $factory = mock(RequestFactory::class);
        $requests = $parameters->expectedRequests();
        $clientHttpResponses = [];
        $expected = [];

        $factory->shouldReceive('create')
            ->with($parameters)
            ->andReturn($requests);

        $client->shouldReceive('gzip')
            ->withNoArgs()
            ->andReturnSelf();

        array_walk($requests, function (Request $request) use (&$clientHttpResponses, &$expected) {
            $id = $request->id();
            $responseBody = ["response-{$id}"];
            $responseHeaders = ['dummy-headers'];
            $httpResponse = mock(ResponseInterface::class);

            $httpResponse->shouldReceive('getBody')
                ->withNoArgs()
                ->andReturn(json_encode($responseBody));

            $httpResponse->shouldReceive('getHeaders')
                ->withNoArgs()
                ->andReturn($responseHeaders);

            $clientHttpResponses[$id] = $httpResponse;
            $expected[$id] = new TimeMachine($responseBody, $responseHeaders);
        });

        $client->shouldReceive('concurrentRequests')
            ->with($requests)
            ->andReturn($clientHttpResponses);

        $api = new Api($client, $factory);
        $this->assertEquals($expected, $api->timeMachine($parameters));
    }
}
