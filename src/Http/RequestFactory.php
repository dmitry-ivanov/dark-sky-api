<?php

namespace DmitryIvanov\DarkSkyApi\Http;

use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
use DmitryIvanov\DarkSkyApi\Http\Request\QueryBuilder;
use DmitryIvanov\DarkSkyApi\Http\Request\UrlGenerator;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Url as UrlContract;
use DmitryIvanov\DarkSkyApi\Contracts\Http\RequestFactory as RequestFactoryContract;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Request\QueryBuilder as QueryBuilderContract;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Request\UrlGenerator as UrlGeneratorContract;

class RequestFactory implements RequestFactoryContract
{
    /**
     * The URL generator.
     *
     * @var \DmitryIvanov\DarkSkyApi\Contracts\Http\Request\UrlGenerator
     */
    protected $url;

    /**
     * The query builder.
     *
     * @var \DmitryIvanov\DarkSkyApi\Contracts\Http\Request\QueryBuilder
     */
    protected $query;

    /**
     * Create a new instance of the request factory.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\Request\UrlGenerator|null  $url
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\Request\QueryBuilder|null  $query
     * @return void
     */
    public function __construct(UrlGeneratorContract $url = null, QueryBuilderContract $query = null)
    {
        $this->url = isset($url) ? $url : new UrlGenerator;
        $this->query = isset($query) ? $query : new QueryBuilder;
    }

    /**
     * Create the API request(s) by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Request|array
     */
    public function create(Parameters $parameters)
    {
        $url = $this->url->generate($parameters);
        $query = $this->query->build($parameters);

        if ($url instanceof UrlContract) {
            return $this->createRequest($url, $query);
        }

        return array_map(function (UrlContract $url) use ($query) {
            return $this->createRequest($url, $query);
        }, $url);
    }

    /**
     * Create a request by the given URL object and the query string.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\Url  $url
     * @param  string  $query
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Request
     */
    protected function createRequest(UrlContract $url, $query)
    {
        $id = ($metadata = $url->metadata()) ? $metadata->date() : null;

        return new Request($url->value(), $query, $id);
    }
}
