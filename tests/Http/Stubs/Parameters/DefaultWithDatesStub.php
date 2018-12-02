<?php

namespace Tests\Http\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class DefaultWithDatesStub extends DefaultStub
{
    /**
     * The dates for the time machine requests.
     *
     * @var array|string|null
     */
    protected $dates = ['09 Sep 2018', '10 October 2018', '2018-11-11 11:00:00'];

    /**
     * The expected URL(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url|array
     */
    public function expectedUrl()
    {
        $url = parent::expectedUrl()->value();

        $date1 = '09 Sep 2018';
        $date2 = '10 October 2018';
        $date3 = '2018-11-11 11:00:00';

        $urlDate1 = '2018-09-09T00:00:00';
        $urlDate2 = '2018-10-10T00:00:00';
        $urlDate3 = '2018-11-11T11:00:00';

        return [
            new Url("{$url},{$urlDate1}", new UrlMetadata($date1)),
            new Url("{$url},{$urlDate2}", new UrlMetadata($date2)),
            new Url("{$url},{$urlDate3}", new UrlMetadata($date3)),
        ];
    }
}
