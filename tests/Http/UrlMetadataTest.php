<?php

namespace Tests\Http;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class UrlMetadataTest extends TestCase
{
    /**
     * @test
     *
     * @param  string  $date
     *
     * @testWith ["2018-11-11"]
     *           ["11 Nov 2018"]
     *           ["11 November 2018"]
     *           ["2018-11-11 11:00:00"]
     */
    public function it_has_the_date_method($date)
    {
        $metadata = new UrlMetadata($date);

        $this->assertEquals($date, $metadata->date());
    }
}
