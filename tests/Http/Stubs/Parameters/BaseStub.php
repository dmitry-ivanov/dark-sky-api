<?php

namespace Tests\Http\Stubs\Parameters;

use DmitryIvanov\DarkSkyApi\Parameters;

abstract class BaseStub extends Parameters
{
    /**
     * The expected URL(s).
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url|array
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
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Request|array
     */
    abstract public function expectedRequests();
}
