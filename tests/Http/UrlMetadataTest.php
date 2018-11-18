<?php

namespace Tests\Http;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class UrlMetadataTest extends TestCase
{
    /**
     * @test
     * @param  string  $date
     * @dataProvider dates_provider
     */
    public function it_has_the_date_method_which_returns_the_date_in_the_proper_format($date)
    {
        $expected = date('Y-m-d', strtotime($date));

        $this->assertEquals($expected, (new UrlMetadata($date))->date());
    }

    /**
     * The data provider for the test.
     *
     * @see it_has_the_date_method_which_returns_the_date_in_the_proper_format
     *
     * @return array
     */
    public function dates_provider()
    {
        return [
            ['2018-11-11'],
            ['11 November 2018'],
            ['2018-11-11T00:00:00'],
        ];
    }
}
