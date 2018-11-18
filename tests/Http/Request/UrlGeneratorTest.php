<?php

namespace Tests\Http\Request;

use Tests\TestCase;
use Tests\Http\Stubs\Parameters\BaseStub;
use Tests\Http\Stubs\Parameters\ForecastStub;
use DmitryIvanov\DarkSkyApi\Http\Request\UrlGenerator;
use Tests\Http\Stubs\Parameters\ForecastWithDatesStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesLeanStub;

class UrlGeneratorTest extends TestCase
{
    /**
     * @test
     * @param  \Tests\Http\Stubs\Parameters\BaseStub  $parameters
     * @dataProvider parameters_provider
     */
    public function it_generates_the_request_urls_by_the_given_parameters(BaseStub $parameters)
    {
        $this->assertEquals($parameters->expectedUrl(), (new UrlGenerator)->generate($parameters));
    }

    /**
     * The data provider for the test.
     *
     * @see it_generates_the_request_urls_by_the_given_parameters
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
