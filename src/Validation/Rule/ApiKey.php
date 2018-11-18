<?php

namespace DmitryIvanov\DarkSkyApi\Validation\Rule;

use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;

class ApiKey implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function passes($value)
    {
        return !empty($value) && is_string($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given API key is invalid.';
    }
}
