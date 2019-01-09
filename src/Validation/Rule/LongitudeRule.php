<?php

namespace DmitryIvanov\DarkSkyApi\Validation\Rule;

use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;

class LongitudeRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function passes($value)
    {
        return is_numeric($value)
            && ($value >= -180)
            && ($value <= +180);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given longitude is invalid.';
    }
}
