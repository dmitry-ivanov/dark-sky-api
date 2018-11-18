<?php

namespace Tests\Http\Stubs\Parameters;

class ForecastWithExtendedBlocksStub extends ForecastStub
{
    /**
     * The extended blocks.
     *
     * @var string|null
     */
    protected $extendedBlocks = 'hourly';

    /**
     * The expected query string.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return 'extend=hourly';
    }
}
