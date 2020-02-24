<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Parameters;

use DmitryIvanov\DarkSkyApi\Parameters\Language;
use DmitryIvanov\DarkSkyApi\Tests\TestCase;

class LanguageTest extends TestCase
{
    /** @test */
    public function it_has_the_values_static_method_which_returns_supported_values()
    {
        $expected = [
            'ar', 'az', 'be', 'bg', 'bs', 'ca', 'cs', 'da', 'de', 'el', 'en', 'es', 'et', 'fi', 'fr',
            'he', 'hr', 'hu', 'id', 'is', 'it', 'ja', 'ka', 'ko', 'kw', 'lv', 'nb', 'nl', 'no', 'pl',
            'pt', 'ro', 'ru', 'sk', 'sl', 'sr', 'sv', 'tet', 'tr', 'uk', 'x-pig-latin', 'zh', 'zh-tw',
        ];

        $this->assertEquals($expected, Language::values());
    }
}
