<?php

namespace Tests\Http\Stubs\Parameters;

class DefaultWithBlocksAllStub extends DefaultStub
{
    /**
     * The blocks.
     *
     * @var array|string|null
     */
    protected $blocks = ['flags', 'alerts', 'daily', 'currently', 'minutely', 'hourly'];

    /**
     * The expected query string.
     *
     * If all blocks were specified, we don't need to exclude anything.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return parent::expectedQuery();
    }
}
