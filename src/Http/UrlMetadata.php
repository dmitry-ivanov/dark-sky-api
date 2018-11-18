<?php

namespace DmitryIvanov\DarkSkyApi\Http;

use DmitryIvanov\DarkSkyApi\Contracts\Http\UrlMetadata as UrlMetadataContract;

class UrlMetadata implements UrlMetadataContract
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
        $this->date = date('Y-m-d', strtotime($date));
    }

    /**
     * Get the date, for which the URL was generated.
     *
     * The format is "Y-m-d".
     *
     * @see http://php.net/manual/en/function.date.php
     *
     * @return string
     */
    public function date()
    {
        return $this->date;
    }
}
