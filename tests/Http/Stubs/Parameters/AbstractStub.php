<?php

namespace Tests\Http\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Parameters;

abstract class AbstractStub extends Parameters
{
    /**
     * The expected URL(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Http\Url|\DmitryIvanov\DarkSkyApi\Http\Url[]
     */
    abstract public function expectedUrl();

    /**
     * The expected query string.
     *
     * @return string
     */
    abstract public function expectedQuery();

    /**
     * The expected request(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Http\Request|\DmitryIvanov\DarkSkyApi\Http\Request[]
     */
    abstract public function expectedRequests();
}
