<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters;

class DefaultWithBlocksOneStub extends DefaultStub
{
    /**
     * The blocks.
     *
     * @var array|string|null
     */
    protected $blocks = ['currently'];

    /**
     * The expected query string.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return 'exclude=minutely,hourly,daily,alerts,flags';
    }
}
