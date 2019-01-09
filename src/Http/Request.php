<?php

namespace DmitryIvanov\DarkSkyApi\Http;

class Request
{
    /**
     * The ID.
     *
     * @var string|null
     */
    protected $id;

    /**
     * The URL.
     *
     * @var string
     */
    protected $url;

    /**
     * The query string.
     *
     * @var string
     */
    protected $query;

    /**
     * Create a new instance of the request.
     *
     * @param  string  $url
     * @param  string  $query
     * @param  string|null  $id
     * @return void
     */
    public function __construct($url, $query, $id = null)
    {
        $this->id = $id;
        $this->url = $url;
        $this->query = $query;
    }

    /**
     * Get the ID.
     *
     * @return string|null
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get the URL.
     *
     * @return string
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * Get the query string.
     *
     * @return string
     */
    public function query()
    {
        return $this->query;
    }
}
