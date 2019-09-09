<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Parameters;

class AcceptableStub extends Parameters
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
    protected $latitude = 1.234;

    /**
     * The longitude.
     *
     * @var float
     */
    protected $longitude = 5.678;
}
