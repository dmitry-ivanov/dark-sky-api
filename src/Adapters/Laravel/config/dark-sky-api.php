<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Secret Key
    |--------------------------------------------------------------------------
    |
    | The secret key which grants you access to the Dark Sky API.
    | The free account allows up to 1000 calls per day to API.
    | Keep it secret, do not embed it to the response body.
    |
    | @link https://darksky.net/dev/register
    |
    */

    'key' => env('DARK_SKY_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    |
    | Specify the language for the human-readable text summaries here.
    | Check the documentation for the list of the supported values.
    | Null means the usage of the default Dark Sky API settings.
    |
    | @see https://darksky.net/dev/docs#request-parameters
    |
    */

    'language' => null,

    /*
    |--------------------------------------------------------------------------
    | Units
    |--------------------------------------------------------------------------
    |
    | Here you may specify the unit system for the weather conditions.
    | Check the documentation for the list of the supported values.
    | Null means the usage of the default Dark Sky API settings.
    |
    | @see https://darksky.net/dev/docs#request-parameters
    |
    */

    'units' => null,

    /*
    |--------------------------------------------------------------------------
    | Extend
    |--------------------------------------------------------------------------
    |
    | Here specify the weather blocks, which should have the extended data.
    | For now, it affects only the forecast requests, the hourly blocks.
    | When present, the block extends from the 48 hours to 168 hours.
    |
    | @see https://darksky.net/dev/docs#request-parameters
    |
    */

    'extend' => null,

];
