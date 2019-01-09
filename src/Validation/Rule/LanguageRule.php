<?php

namespace DmitryIvanov\DarkSkyApi\Validation\Rule;

use DmitryIvanov\DarkSkyApi\Parameters\Language;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;

class LanguageRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function passes($value)
    {
        if (is_null($value)) {
            return true;
        }

        return is_string($value)
            && in_array($value, Language::values());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given language is invalid.';
    }
}
