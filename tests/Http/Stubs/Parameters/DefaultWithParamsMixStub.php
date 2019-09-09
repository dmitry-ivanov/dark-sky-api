<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Http\Stubs\Parameters;

class DefaultWithParamsMixStub extends DefaultStub
{
    /**
     * The units.
     *
     * @var string|null
     */
    protected $units = 'si';

    /**
     * The language.
     *
     * @var string|null
     */
    protected $language = 'ru';

    /**
     * The blocks.
     *
     * @var array|string|null
     */
    protected $blocks = ['currently', 'daily'];

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
        return 'exclude=minutely,hourly,alerts,flags&extend=hourly&lang=ru&units=si';
    }
}
