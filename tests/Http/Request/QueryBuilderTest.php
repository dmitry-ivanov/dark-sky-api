<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Request;

use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Http\Request\QueryBuilder;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\AbstractStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithBlockStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithUnitsStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithBlocksStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithLanguageStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithBlocksAllStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithBlocksOneStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithParamsMixStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithExtendedBlockStub;

class QueryBuilderTest extends TestCase
{
    /**
     * @test
     *
     * @param  \DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\AbstractStub  $parameters
     *
     * @dataProvider provide_parameters
     */
    public function it_builds_the_request_query_string_by_the_given_parameters(AbstractStub $parameters)
    {
        $queryBuilder = new QueryBuilder;

        $expected = $parameters->expectedQuery();

        $this->assertEquals($expected, $queryBuilder->build($parameters));
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
