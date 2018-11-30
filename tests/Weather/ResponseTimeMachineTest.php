<?php

namespace Tests\Weather;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Weather\DataPoint;
use DmitryIvanov\DarkSkyApi\Weather\ResponseTimeMachine;

class ResponseTimeMachineTest extends TestCase
{
    /** @test */
    public function it_has_the_daily_method_which_returns_the_data_point_instead_of_the_data_block()
    {
        $response = new ResponseTimeMachine([
            'daily' => [
                'data' => [
                    ['dummy-point'],
                ]
            ],
        ], ['dummy']);

        $expected = new DataPoint(['dummy-point']);

        $this->assertEquals($expected, $response->daily());
    }

    /**
     * @test
     *
     * @param  array  $data
     *
     * @testWith [["dummy"]]
     *           [{"daily": {"data": []}}]
     */
    public function the_daily_method_returns_null_if_there_is_no_underlying_data(array $data)
    {
        $response = new ResponseTimeMachine($data, ['dummy']);

        $this->assertNull($response->daily());
    }
}
