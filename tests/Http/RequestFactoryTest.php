<?php

namespace Tests\Http;

use Tests\TestCase;
use Tests\Http\Stubs\Parameters\DefaultStub;
use Tests\Http\Stubs\Parameters\AbstractStub;
use DmitryIvanov\DarkSkyApi\Http\RequestFactory;
use Tests\Http\Stubs\Parameters\DefaultWithDateStub;
use Tests\Http\Stubs\Parameters\DefaultWithDatesStub;
use Tests\Http\Stubs\Parameters\DefaultWithDatesOneStub;

class RequestFactoryTest extends TestCase
{
    /**
     * @test
     *
     * @param  \Tests\Http\Stubs\Parameters\AbstractStub  $parameters
     *
     * @dataProvider provide_parameters
     */
    public function it_creates_the_api_requests_by_the_given_parameters(AbstractStub $parameters)
    {
        $factory = new RequestFactory;

        $expected = $parameters->expectedRequests();

        $this->assertEquals($expected, $factory->create($parameters));
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
            [new DefaultWithDateStub],
            [new DefaultWithDatesStub],
            [new DefaultWithDatesOneStub],
        ];
    }
}
