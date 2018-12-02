<?php

namespace Tests\Http\Stubs\Parameters;

class DefaultWithLanguageStub extends DefaultStub
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
