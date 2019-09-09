<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters;

class DefaultWithUnitsStub extends DefaultStub
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
