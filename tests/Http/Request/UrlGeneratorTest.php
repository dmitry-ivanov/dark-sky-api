<?php

namespace Tests\Http\Request;

use Tests\TestCase;
use Tests\Http\Stubs\Parameters\ForecastStub;
use DmitryIvanov\DarkSkyApi\Http\Request\UrlGenerator;
use Tests\Http\Stubs\Parameters\ForecastWithDatesStub;
use Tests\Http\Stubs\Parameters\BaseStub as Parameters;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleDatesLeanStub;

class UrlGeneratorTest extends TestCase
{
    /**
     * @test
     *
     * @param  \Tests\Http\Stubs\Parameters\BaseStub  $parameters
     *
     * @dataProvider provide_parameters
     */
    public function it_generates_the_request_urls_by_the_given_parameters(Parameters $parameters)
    {
        $urlGenerator = new UrlGenerator;

        $this->assertEquals($parameters->expectedUrl(), $urlGenerator->generate($parameters));
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
