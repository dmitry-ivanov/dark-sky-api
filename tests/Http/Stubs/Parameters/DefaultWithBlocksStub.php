<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters;

class DefaultWithBlocksStub extends DefaultStub
{
    /**
     * The blocks.
     *
     * @var array|string|null
     */
    protected $blocks = ['currently', 'daily'];

    /**
     * The expected query string.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return 'exclude=minutely,hourly,alerts,flags';
    }
}
