<?php

namespace DmitryIvanov\DarkSkyApi\Parameters;

class Language
{
    /**
     * Get the supported languages.
     *
     * @return array
     */
    public static function values()
    {
        return [
            'ar', 'az', 'be', 'bg', 'bs', 'ca', 'cs', 'da', 'de', 'el', 'en', 'es', 'et', 'fi', 'fr',
            'he', 'hr', 'hu', 'id', 'is', 'it', 'ja', 'ka', 'ko', 'kw', 'lv', 'nb', 'nl', 'no', 'pl',
            'pt', 'ro', 'ru', 'sk', 'sl', 'sr', 'sv', 'tet', 'tr', 'uk', 'x-pig-latin', 'zh', 'zh-tw',
        ];
    }
}
