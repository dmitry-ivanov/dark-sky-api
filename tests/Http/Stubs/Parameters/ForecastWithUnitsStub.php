<?php

namespace Tests\Http\Stubs\Parameters;

class ForecastWithUnitsStub extends ForecastStub
{
    /**
     * The units.
     *
     * @var string|null
     */
    protected $units = 'si';

    /**
     * The expected query string.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return 'units=si';
    }
}
