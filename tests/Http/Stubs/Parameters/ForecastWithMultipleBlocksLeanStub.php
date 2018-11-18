<?php

namespace Tests\Http\Stubs\Parameters;

class ForecastWithMultipleBlocksLeanStub extends ForecastStub
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
