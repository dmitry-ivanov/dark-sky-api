<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Adapters\Laravel\Facades;

use DmitryIvanov\DarkSkyApi\Service;
use Illuminate\Support\Facades\Facade;
use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Adapters\Laravel\Facades\DarkSkyApi;

class DarkSkyApiTest extends TestCase
{
    /** @test */
    public function it_extends_the_base_facade_class()
    {
        $this->assertSubclassOf(DarkSkyApi::class, Facade::class);
    }

    /** @test */
    public function it_returns_service_class_as_the_facade_accessor()
    {
        $this->assertEquals(DarkSkyApi::getFacadeAccessor(), Service::class);
    }
}
