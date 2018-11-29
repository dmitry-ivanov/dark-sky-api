<?php

namespace Tests\Http;

use Tests\TestCase;
use Tests\Http\Stubs\Parameters\ForecastStub;
use DmitryIvanov\DarkSkyApi\Http\RequestFactory;
use Tests\Http\Stubs\Parameters\ForecastWithDatesStub;
use Tests\Http\Stubs\Parameters\BaseStub as Parameters;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesLeanStub;

class RequestFactoryTest extends TestCase
{
    /**
     * @test
     *
     * @param  \Tests\Http\Stubs\Parameters\BaseStub  $parameters
     *
     * @dataProvider provide_parameters
     */
    public function it_creates_the_api_requests_by_the_given_parameters(Parameters $parameters)
    {
        $factory = new RequestFactory;

        $this->assertEquals($parameters->expectedRequests(), $factory->create($parameters));
    }

    /**
     * The data provider.
     *
     * @return array
     */
    public function provide_parameters()
    {
        return [
            [new ForecastStub],
            [new ForecastWithDatesStub],
            [new ForecastWithMultipleDatesStub],
            [new ForecastWithMultipleDatesLeanStub],
        ];
    }
}
