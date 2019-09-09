<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Request;

use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Http\Request\UrlGenerator;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\AbstractStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithDateStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithDatesStub;
use DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\DefaultWithDatesOneStub;

class UrlGeneratorTest extends TestCase
{
    /**
     * @test
     *
     * @param  \DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters\AbstractStub  $parameters
     *
     * @dataProvider provide_parameters
     */
    public function it_generates_the_request_urls_by_the_given_parameters(AbstractStub $parameters)
    {
        $urlGenerator = new UrlGenerator;

        $expected = $parameters->expectedUrl();

        $this->assertEquals($expected, $urlGenerator->generate($parameters));
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
