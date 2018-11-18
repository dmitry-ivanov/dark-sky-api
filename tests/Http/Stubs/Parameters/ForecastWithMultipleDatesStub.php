<?php

namespace Tests\Http\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class ForecastWithMultipleDatesStub extends ForecastStub
{
    /**
     * The dates for the time machine requests.
     *
     * @var array|string|null
     */
    protected $dates = ['2018-09-09', '10 October 2018', '11 November 2018'];

    /**
     * The expected URL(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url|array
     */
    public function expectedUrl()
    {
        $url = parent::expectedUrl()->value();

        $date1 = '2018-09-09T00:00:00';
        $date2 = '2018-10-10T00:00:00';
        $date3 = '2018-11-11T00:00:00';

        return [
            new Url("{$url},{$date1}", new UrlMetadata($date1)),
            new Url("{$url},{$date2}", new UrlMetadata($date2)),
            new Url("{$url},{$date3}", new UrlMetadata($date3)),
        ];
    }
}
