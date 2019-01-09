<?php

namespace DmitryIvanov\DarkSkyApi\Validation\Rule;

use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;

class LatitudeRule implements Rule
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
            && ($value >= -90)
            && ($value <= +90);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given latitude is invalid.';
    }
}
