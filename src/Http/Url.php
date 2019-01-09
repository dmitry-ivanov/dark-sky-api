<?php

namespace DmitryIvanov\DarkSkyApi\Http;

class Url
{
    /**
     * The URL.
     *
     * @var string
     */
    protected $value;

    /**
     * The metadata.
     *
     * @var \DmitryIvanov\DarkSkyApi\Http\UrlMetadata|null
     */
    protected $metadata;

    /**
     * Create a new instance of the URL.
     *
     * @param  string  $value
     * @param  \DmitryIvanov\DarkSkyApi\Http\UrlMetadata|null  $metadata
     * @return void
     */
    public function __construct($value, UrlMetadata $metadata = null)
    {
        $this->value = $value;
        $this->metadata = $metadata;
    }

    /**
     * Get the URL.
     *
     * @return string
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Get the metadata.
     *
     * @return \DmitryIvanov\DarkSkyApi\Http\UrlMetadata|null
     */
    public function metadata()
    {
        return $this->metadata;
    }
}
