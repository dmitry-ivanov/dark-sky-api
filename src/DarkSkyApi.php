<?php

namespace DmitryIvanov\DarkSkyApi;

class DarkSkyApi extends Service
{
    /**
     * Create a new instance of the Dark Sky API.
     *
     * @param  string  $key
     * @return void
     */
    public function __construct($key)
    {
        parent::__construct($key);
    }
}
