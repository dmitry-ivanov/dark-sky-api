<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters;

class DefaultWithBlocksAllStub extends DefaultStub
{
    /**
     * The blocks.
     *
     * @var array|string|null
     */
    protected $blocks = ['flags', 'alerts', 'daily', 'currently', 'minutely', 'hourly'];
}
