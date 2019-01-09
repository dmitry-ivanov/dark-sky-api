<?php

namespace Tests\Http\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class DefaultWithDatesOneStub extends DefaultStub
{
    /**
     * The dates for the time machine requests.
     *
     * @var array|string|null
     */
    protected $dates = ['11 November 2018'];

    /**
     * The expected URL(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Http\Url|\DmitryIvanov\DarkSkyApi\Http\Url[]
     */
    public function expectedUrl()
    {
        $url = parent::expectedUrl()->value();

        $date = '11 November 2018';
        $urlDate = '2018-11-11T00:00:00';

        return new Url("{$url},{$urlDate}", new UrlMetadata($date));
    }
}
