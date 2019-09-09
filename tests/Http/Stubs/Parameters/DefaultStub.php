<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\Request;

class DefaultStub extends AbstractStub
{
    /**
     * The API key.
     *
     * @var string
     */
    protected $apiKey = 'api-key-12345';

    /**
     * The latitude.
     *
     * @var float
     */
    protected $latitude = 1.233567890;

    /**
     * The longitude.
     *
     * @var float
     */
    protected $longitude = 5.6784567890;

    /**
     * The expected URL(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Http\Url|\DmitryIvanov\DarkSkyApi\Http\Url[]
     */
    public function expectedUrl()
    {
        return new Url('https://api.darksky.net/forecast/api-key-12345/1.234,5.678');
    }

    /**
     * The expected query string.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return '';
    }

    /**
     * The expected request(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Http\Request|\DmitryIvanov\DarkSkyApi\Http\Request[]
     */
    public function expectedRequests()
    {
        $url = $this->expectedUrl();
        $query = $this->expectedQuery();

        if ($url instanceof Url) {
            return $this->createRequest($url, $query);
        }

        return array_map(function (Url $url) use ($query) {
            return $this->createRequest($url, $query);
        }, $url);
    }

    /**
     * Create a request by the given URL object and the query string.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Http\Url  $url
     * @param  string  $query
     * @return \DmitryIvanov\DarkSkyApi\Http\Request
     */
    protected function createRequest(Url $url, $query)
    {
        $id = null;

        if ($urlMetadata = $url->metadata()) {
            $id = $urlMetadata->date();
        }

        return new Request($url->value(), $query, $id);
    }
}
