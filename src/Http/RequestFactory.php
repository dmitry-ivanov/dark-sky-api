<?php

namespace DmitryIvanov\DarkSkyApi\Http;

use DmitryIvanov\DarkSkyApi\Parameters;
use DmitryIvanov\DarkSkyApi\Http\Request\QueryBuilder;
use DmitryIvanov\DarkSkyApi\Http\Request\UrlGenerator;

class RequestFactory
{
    /**
     * The URL generator.
     *
     * @var \DmitryIvanov\DarkSkyApi\Http\Request\UrlGenerator
     */
    protected $url;

    /**
     * The query builder.
     *
     * @var \DmitryIvanov\DarkSkyApi\Http\Request\QueryBuilder
     */
    protected $query;

    /**
     * Create a new instance of the request factory.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Http\Request\UrlGenerator|null  $url
     * @param  \DmitryIvanov\DarkSkyApi\Http\Request\QueryBuilder|null  $query
     * @return void
     */
    public function __construct(UrlGenerator $url = null, QueryBuilder $query = null)
    {
        $this->url = isset($url) ? $url : new UrlGenerator;
        $this->query = isset($query) ? $query : new QueryBuilder;
    }

    /**
     * Create the API request(s) by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Http\Request|\DmitryIvanov\DarkSkyApi\Http\Request[]
     */
    public function create(Parameters $parameters)
    {
        $url = $this->url->generate($parameters);
        $query = $this->query->build($parameters);

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
