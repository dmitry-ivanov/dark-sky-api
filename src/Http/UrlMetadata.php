<?php

namespace DmitryIvanov\DarkSkyApi\Http;

class UrlMetadata
{
    /**
     * The date, for which the URL was generated.
     *
     * @var string
     */
    protected $date;

    /**
     * Create a new instance of the URL metadata.
     *
     * @param  string  $date
     * @return void
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * Get the date, for which the URL was generated.
     *
     * @return string
     */
    public function date()
    {
        return $this->date;
    }
}
