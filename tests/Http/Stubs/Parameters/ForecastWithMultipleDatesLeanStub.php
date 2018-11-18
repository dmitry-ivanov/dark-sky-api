<?php

namespace Tests\Http\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class ForecastWithMultipleDatesLeanStub extends ForecastStub
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
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url|array
     */
    public function expectedUrl()
    {
        $url = parent::expectedUrl()->value();

        $date = '2018-11-11T00:00:00';

        return new Url("{$url},{$date}", new UrlMetadata($date));
    }
}
