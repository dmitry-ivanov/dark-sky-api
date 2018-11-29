<?php

namespace Tests\Http\Request;

use Tests\TestCase;
use Tests\Http\Stubs\Parameters\ForecastStub;
use DmitryIvanov\DarkSkyApi\Http\Request\QueryBuilder;
use Tests\Http\Stubs\Parameters\ForecastWithUnitsStub;
use Tests\Http\Stubs\Parameters\BaseStub as Parameters;
use Tests\Http\Stubs\Parameters\ForecastWithBlocksStub;
use Tests\Http\Stubs\Parameters\ForecastWithLanguageStub;
use Tests\Http\Stubs\Parameters\ForecastWithParametersMixStub;
use Tests\Http\Stubs\Parameters\ForecastWithExtendedBlocksStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleBlocksStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleBlocksAllStub;
use Tests\Http\Stubs\Parameters\ForecastWithMultipleBlocksLeanStub;

class QueryBuilderTest extends TestCase
{
    /**
     * @test
     *
     * @param  \Tests\Http\Stubs\Parameters\BaseStub  $parameters
     *
     * @dataProvider provide_parameters
     */
    public function it_builds_the_request_query_string_by_the_given_parameters(Parameters $parameters)
    {
        $queryBuilder = new QueryBuilder;

        $this->assertEquals($parameters->expectedQuery(), $queryBuilder->build($parameters));
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
            [new ForecastWithUnitsStub],
            [new ForecastWithBlocksStub],
            [new ForecastWithLanguageStub],
            [new ForecastWithParametersMixStub],
            [new ForecastWithExtendedBlocksStub],
            [new ForecastWithMultipleBlocksStub],
            [new ForecastWithMultipleBlocksAllStub],
            [new ForecastWithMultipleBlocksLeanStub],
        ];
    }
}
