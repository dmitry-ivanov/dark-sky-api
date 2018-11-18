<?php

namespace DmitryIvanov\DarkSkyApi\Validation\Rule;

use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;
use DmitryIvanov\DarkSkyApi\Parameters\Language as LanguageParameter;

class Language implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function passes($value)
    {
        return is_null($value)
            || (is_string($value) && in_array($value, LanguageParameter::values()));
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
