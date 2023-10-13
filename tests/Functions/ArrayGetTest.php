<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Functions;

use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use function DmitryIvanov\DarkSkyApi\array_get;

class ArrayGetTest extends TestCase
{
    /** @test */
    public function it_returns_an_item_value_if_the_key_exists()
    {
        $array = ['name' => 'John'];

        $this->assertEquals('John', array_get($array, 'name'));
    }

    /** @test */
    public function it_returns_the_default_value_if_the_key_does_not_exist()
    {
        $array = ['name' => 'John'];

        $this->assertEquals(30, array_get($array, 'age', 30));
    }
}
