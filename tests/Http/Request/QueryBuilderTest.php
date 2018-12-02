<?php

namespace Tests\Http\Request;

use Tests\TestCase;
use Tests\Http\Stubs\Parameters\DefaultStub;
use Tests\Http\Stubs\Parameters\AbstractStub;
use Tests\Http\Stubs\Parameters\DefaultWithBlockStub;
use Tests\Http\Stubs\Parameters\DefaultWithUnitsStub;
use DmitryIvanov\DarkSkyApi\Http\Request\QueryBuilder;
use Tests\Http\Stubs\Parameters\DefaultWithBlocksStub;
use Tests\Http\Stubs\Parameters\DefaultWithLanguageStub;
use Tests\Http\Stubs\Parameters\DefaultWithBlocksAllStub;
use Tests\Http\Stubs\Parameters\DefaultWithBlocksOneStub;
use Tests\Http\Stubs\Parameters\DefaultWithParamsMixStub;
use Tests\Http\Stubs\Parameters\DefaultWithExtendedBlockStub;

class QueryBuilderTest extends TestCase
{
    /**
     * @test
     *
     * @param  \Tests\Http\Stubs\Parameters\AbstractStub  $parameters
     *
     * @dataProvider provide_parameters
     */
    public function it_builds_the_request_query_string_by_the_given_parameters(AbstractStub $parameters)
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
            [new DefaultStub],
            [new DefaultWithUnitsStub],
            [new DefaultWithLanguageStub],
            [new DefaultWithBlockStub],
            [new DefaultWithBlocksStub],
            [new DefaultWithBlocksOneStub],
            [new DefaultWithBlocksAllStub],
            [new DefaultWithExtendedBlockStub],
            [new DefaultWithParamsMixStub],
        ];
    }
}
