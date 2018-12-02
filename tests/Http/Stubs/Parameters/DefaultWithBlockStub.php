<?php

namespace Tests\Http\Stubs\Parameters;

class DefaultWithBlockStub extends DefaultStub
{
    /**
     * The blocks.
     *
     * @var array|string|null
     */
    protected $blocks = 'daily';

    /**
     * The expected query string.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return 'exclude=currently,minutely,hourly,alerts,flags';
    }
}
