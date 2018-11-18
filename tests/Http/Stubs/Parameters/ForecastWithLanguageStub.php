<?php

namespace Tests\Http\Stubs\Parameters;

class ForecastWithLanguageStub extends ForecastStub
{
    /**
     * The language.
     *
     * @var string|null
     */
    protected $language = 'ru';

    /**
     * The expected query string.
     *
     * @return string
     */
    public function expectedQuery()
    {
        return 'lang=ru';
    }
}
