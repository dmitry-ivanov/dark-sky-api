<?php

namespace DmitryIvanov\DarkSkyApi\Tests;

use DmitryIvanov\DarkSkyApi\DarkSkyApi;
use DmitryIvanov\DarkSkyApi\Service;

class DarkSkyApiTest extends TestCase
{
    /** @test */
    public function it_provides_just_the_pretty_name_and_constructor_for_the_service()
    {
        $api = new DarkSkyApi('dummy');

        $this->assertSubclassOf($api, Service::class);
    }
}
