<?php

namespace Tests\Http;

use Tests\TestCase;
use Tests\Http\Stubs\Parameters\BaseStub;
use Tests\Http\Stubs\Parameters\ForecastStub;
use DmitryIvanov\DarkSkyApi\Http\RequestFactory;
use Tests\Http\Stubs\Parameters\ForecastWithDatesStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesLeanStub;

class RequestFactoryTest extends TestCase
{
    /**
     * @test
     * @param  \Tests\Http\Stubs\Parameters\BaseStub  $parameters
     * @dataProvider parameters_provider
     */
    public function it_creates_the_api_requests_by_the_given_parameters(BaseStub $parameters)
    {
        $this->assertEquals($parameters->expectedRequests(), (new RequestFactory)->create($parameters));
    }

    /**
     * The data provider for the test.
     *
     * @see it_creates_the_api_requests_by_the_given_parameters
     *
     * @return array
     */
    public function parameters_provider()
    {
        return [
            [new ForecastStub],
            [new ForecastWithDatesStub],
            [new ForecastWithMultipleDatesStub],
            [new ForecastWithMultipleDatesLeanStub],
        ];
    }
}
